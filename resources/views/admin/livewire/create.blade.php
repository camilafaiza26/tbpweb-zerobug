<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
  
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
  
  
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
  
      
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <h1 class="font-bold text-center mb-4">Tambah Kelas</h1>  <!--Edit Kelas Juga-->
            </div>
              <div>
                  <div class="mb-2">
                      <input wire:model="kelasId" type="hidden" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input Post">
                  </div>
                  <div class="mb-2">
                      <label for="kode_kelas" class="block">Kode Kelas</label>
                      <input wire:model="kode_kelas" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input Kode Kelas">
                      @error('kode_kelas') <h1 class="text-red-500">{{$message}}</h1>@enderror
                  </div>
                  <div class="mb-2">
                      <label for="kode_matkul" class="block">Kode Matkul</label>
                      <input wire:model="kode_matkul" name="kode_matkul" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input Kode Matkul">
                      @error('kode_matkul') <h1 class="text-red-500">{{$message}}</h1>@enderror
                  </div>
                  <div class="mb-2">
                    <label for="nama_matkul" class="block">Nama Matkul</label>
                    <input wire:model="nama_matkul" name="nama_matkul" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input Matkul">
                    @error('nama_matkul') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
                <div class="mb-2">
                    <label for="semester" class="block">Semester</label>
                    <select wire:model="semester" name="semester" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input Semester">
                      <option disabled selected >Pilih Semester</option>
                      <option value="1">Semester I</option>
                      <option value="2">Semester II</option>
                  </select>
                    @error('semester') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
                <div class="mb-2">
                    <label for="tahun" class="block">Tahun</label>
                    <input type="number"  max="4" wire:model="tahun" name="tahun" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input Tahun">
                    @error('tahun') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
                <div class="mb-2">
                    <label for="sks" class="block">SKS</label>
                    <input type="number" wire:model="sks" name="sks" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Input SKS">
                    @error('sks') <h1 class="text-red-500">{{$message}}</h1>@enderror
                </div>
              </div>       
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Submit
            </button>
          </span>
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="hideModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Cancel
            </button>
          </span>
        </div>
       </form>
      </div>
       
    </div>
  </div>