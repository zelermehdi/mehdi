<?php

namespace App\Support;

use App\Models\OpeningHour;
use Carbon\Carbon;

class BarStatus
{
    public static function compute(string $tz = 'Europe/Paris'): array
    {
        Carbon::setLocale('fr');
        $now = Carbon::now($tz);

        $hours = OpeningHour::all()->keyBy('day_of_week');

        $today = $now->dayOfWeekIso; // 1..7
        $yesterday = $today === 1 ? 7 : $today - 1;

        $isBetween = fn(Carbon $t, Carbon $start, Carbon $end)
            => $t->greaterThanOrEqualTo($start) && $t->lessThan($end);

        $dayInterval = function (int $dayIso, Carbon $baseDate) use ($hours, $tz) {
            $h = $hours[$dayIso] ?? null;
            if (!$h || $h->is_closed || !$h->opens_at || !$h->closes_at) return null;

            $open  = Carbon::parse($baseDate->toDateString().' '.$h->opens_at, $tz);
            $close = Carbon::parse($baseDate->toDateString().' '.$h->closes_at, $tz);

            // fermeture après minuit
            if ($close->lessThanOrEqualTo($open)) $close->addDay();

            return [$open, $close];
        };

        // Aujourd'hui
        $todayInterval = $dayInterval($today, $now->copy());
        $openToday = false; $closeToday = null;
        if ($todayInterval) {
            [$openT, $closeT] = $todayInterval;
            $openToday = $isBetween($now, $openT, $closeT);
            $closeToday = $closeT;
        }

        // “après minuit” depuis hier
        $yInterval = $dayInterval($yesterday, $now->copy()->subDay());
        $openFromYesterday = false; $closeFromYesterday = null;
        if ($yInterval) {
            [$openY, $closeY] = $yInterval;
            if ($isBetween($now, $openY, $closeY)) {
                $openFromYesterday = true;
                $closeFromYesterday = $closeY;
            }
        }

        $isOpen = $openToday || $openFromYesterday;
        $closesAt = $openFromYesterday ? $closeFromYesterday : $closeToday;

        // Prochaine ouverture (FR)
        $nextOpenText = null;
        if (!$isOpen) {
            for ($i=0; $i<8; $i++) {
                $d = (($today - 1 + $i) % 7) + 1;
                $interval = $dayInterval($d, $now->copy()->addDays($i));
                if ($interval) {
                    [$openN] = $interval;
                    $nextOpenText = $i === 0
                        ? 'Ouvre à '.$openN->format('H\hi')
                        : 'Ouvre '.mb_strtolower($openN->translatedFormat('l')).' à '.$openN->format('H\hi');
                    break;
                }
            }
        }

        // Happy hour 18:00-22:00 (seulement si ouvert)
        $hhStart = Carbon::parse($now->toDateString().' 18:00', $tz);
        $hhEnd   = Carbon::parse($now->toDateString().' 22:00', $tz);
        $isHappyHour = $isOpen && $isBetween($now, $hhStart, $hhEnd);

        $statusLabel = $isOpen
            ? ('Ouvert • jusqu’à '.$closesAt?->format('H\hi'))
            : ('Fermé • '.$nextOpenText);

        return [
            'now' => $now,
            'isOpen' => $isOpen,
            'isHappyHour' => $isHappyHour,
            'statusLabel' => $statusLabel,
        ];
    }
}
