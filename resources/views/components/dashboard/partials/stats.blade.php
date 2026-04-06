<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 text-center italic">
    <div class="bg-white p-6 rounded-3xl shadow-sm border-2 border-gray-50">
        <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Total In</h3>
        <p class="text-2xl font-black text-emerald-500">Rp {{ number_format($balance + $total_expense, 0, ',', '.') }}</p>
    </div>
    <div class="bg-white p-6 rounded-3xl shadow-sm border-2 border-gray-50">
        <h3 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Total Out</h3>
        <p class="text-2xl font-black text-red-500">Rp {{ number_format($total_expense, 0, ',', '.') }}</p>
    </div>
    <div class="bg-gray-900 p-6 rounded-3xl shadow-xl shadow-gray-200">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-widest mb-2">Sisa Saldo</h3>
        <p class="text-2xl font-black text-white">Rp {{ number_format($balance, 0, ',', '.') }}</p>
    </div>
</div>