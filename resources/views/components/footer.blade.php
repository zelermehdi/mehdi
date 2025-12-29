<footer class="border-t border-white/10">
  <div class="mx-auto max-w-6xl px-4 py-10">
    <div class="grid md:grid-cols-3 gap-8">
      <div>
        <p class="text-white font-semibold text-lg">Verre Gule</p>
        <p class="text-white/70 text-sm mt-2">
          Bar-brasserie convivial à Rouen : plats maison, carte variée, cocktails.
        </p>
        <p class="text-xs text-white/50 mt-3">
          Happy Hour : <span class="text-white/70">17h – 20:30h</span>
        </p>
      </div>

      <div>
        <p class="text-white/80 text-sm font-semibold">Infos</p>
        <ul class="mt-3 space-y-2 text-sm text-white/70">
          <li>📍 19 Rue Saint-Etienne des Tonneliers, 76000 Rouen</li>
          <li>📞 <a class="hover:underline text-white/85" href="tel:+33983776901">09 83 77 69 01</a></li>
        </ul>
      </div>

      <div>
        <p class="text-white/80 text-sm font-semibold">Liens</p>
        <div class="mt-3 flex flex-wrap gap-2">
          <button type="button" data-open-menu class="px-3 py-2 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 transition text-sm">
            Carte
          </button>
          <a href="#infos" class="px-3 py-2 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 transition text-sm">
            Accès
          </a>
          <button type="button" data-open-contact class="px-3 py-2 rounded-lg border border-white/10 bg-white/5 hover:bg-white/10 transition text-sm">
            Contact
          </button>
        </div>
      </div>
    </div>

    <div class="mt-10 pt-6 border-t border-white/10 text-xs text-white/50 flex flex-col sm:flex-row gap-2 sm:items-center sm:justify-between">
      <p>© {{ date('Y') }} Verre Gule — Tous droits réservés.</p>
      <p>Site vitrine — Rouen</p>
    </div>
  </div>
</footer>
