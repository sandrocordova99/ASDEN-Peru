<form action="#" class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6 lg:max-w-xl lg:p-8">
    <div class="mb-6 grid grid-cols-2 gap-4">

        <div class="col-span-2 sm:col-span-1">
            <label for="card-number-input" class="mb-2 block text-sm font-medium text-gray-900"> Número de tarjeta* </label>
            <input type="text" id="card-number-input" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pe-10 text-sm text-gray-900 placeholder:text-gray-400 focus:border-primary-500 focus:ring-primary-500" placeholder="xxxx-xxxx-xxxx-xxxx" pattern="^4[0-9]{12}(?:[0-9]{3})?$" required />
        </div>

        <div>
            <label for="card-expiration-input" class="mb-2 block text-sm font-medium text-gray-900">Fecha Vencimiento* </label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5">
                <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                    fill-rule="evenodd"
                    d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                    clip-rule="evenodd"
                    />
                </svg>
                </div>
                <input id="card-expiration-input" type="month" class="block z-50 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-9 text-sm text-gray-900 placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500" placeholder="12/23" required /> 
            </div>
        </div>
        
        <div>
            <label class="relative inline-block">
                CVV*
                <button type="button" class="text-gray-400 hover:text-gray-900">
                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd" />
                    </svg>
                </button>
                <span class="tooltip">Los 3 últimos dígitos de la tarjeta</span>
            </label>
            <input type="number" id="cvv-input" aria-describedby="helper-text-explanation" class="block w-full rounded-lg border placeholder:text-gray-400 border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500" placeholder="•••" required />
        </div>

        <div class="col-span-2 sm:col-span-1">
            <label for="full_name" class="mb-2 block text-sm font-medium text-gray-900 "> Nombre en la tarjeta* </label>
            <input type="text" id="full_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder:text-gray-400 focus:border-primary-500 focus:ring-primary-500" placeholder="Bonnie Green" required />
        </div>
    </div>

    <button type="submit" class="flex cursor-pointer w-full items-center justify-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium hover:bg-blue-800 text-white focus:outline-none focus:ring-4 focus:ring-blue-300">Pagar Ahora</button>
</form>

<style>
.tooltip {
  display: none;
  position: absolute;
  bottom: 100%; /* below the button */
  left: 0;
  margin-top: 0.5rem;
  background: #111;
  color: white;
  padding: 0.5rem;
  font-size: 0.875rem;
  border-radius: 0.5rem;
  white-space: nowrap;
  z-index: 100;
}
button:hover + .tooltip {
  display: inline-block;
}
</style>