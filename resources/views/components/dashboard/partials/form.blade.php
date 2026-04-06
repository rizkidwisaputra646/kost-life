<div id="form-catat" class="bg-white p-8 rounded-3xl shadow-sm border-2 border-emerald-100 mb-10 transition-all hover:border-emerald-300">
    <h4 class="font-black italic uppercase text-gray-800 mb-6 flex items-center gap-2 text-lg">
        <span class="p-2 bg-emerald-500 rounded-lg text-white">📝</span> Catat Transaksi Baru
    </h4>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 mb-2">Keterangan</label>
                <input type="text" name="description" placeholder="Beli Nasi Padang..." class="w-full border-2 border-gray-50 bg-gray-50 rounded-2xl px-5 py-3 focus:bg-white focus:border-emerald-500 focus:ring-0 font-bold transition-all" required>
            </div>
            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 mb-2">Nominal (Rp)</label>
                <input type="number" name="amount" placeholder="25000" class="w-full border-2 border-gray-50 bg-gray-50 rounded-2xl px-5 py-3 focus:bg-white focus:border-emerald-500 focus:ring-0 font-bold transition-all" required>
            </div>
            <div>
                <label class="block text-[10px] font-black uppercase text-gray-400 mb-2">Kategori</label>
                <select name="type" class="w-full border-2 border-gray-50 bg-gray-50 rounded-2xl px-5 py-3 focus:bg-white focus:border-emerald-500 focus:ring-0 font-bold transition-all uppercase italic">
                    <option value="expense">🔴 PENGELUARAN</option>
                    <option value="income">🟢 PEMASUKAN</option>
                </select>
            </div>
        </div>
        <div class="mt-8 flex justify-end">
            <button type="submit" class="bg-emerald-500 text-white font-black italic uppercase px-10 py-4 rounded-2xl shadow-lg shadow-emerald-200 hover:bg-emerald-600 hover:-translate-y-1 transition-all">
                Simpan Data 🚀
            </button>
        </div>
    </form>
</div>