<x-app-layout >

    <div class="contenedor">

        @session('message')
            <div id="message-container" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block font-bold sm:inline">{{ session('message') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg id="close-button" class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </div>
        @endsession

        <div class="app" >
            
            <h1 class="text-4xl mt-3 font-bold">Lista de Tareas</h1>

            <form class="py-5 my-5" action="{{ route('TodoItem.store') }}" method="POST">
                @csrf
                <div class="row bg-gray-200 ">
                    <input name="descripcion" class="input-text bg-gray-200 placeholder-opacity-50 text-2xl" type="text" placeholder="Ingresa una Tarea">
                    <button type="submit" class="boton-primario bg-orange-500 text-white text-2xl">
                        Ingresar
                    </button>
                </div>
            </form>
        
            <div class="flex flex-col">
                @foreach ($TodoItems as $TodoItem)
                    <div class="row"> 
                        <div class="">
                            <input  class="mx-2" type="checkbox" name="opt-text" id="opt"/>
                            <label class="item-texto text-left">{{ $TodoItem->descripcion }}</label>
                        </div>
                        <div>
                            <form action="{{ route('TodoItem.destroy', $TodoItem->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-black font-bold text-3xl">
                                    x
                                </button>
                                
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.getElementById('close-button').addEventListener('click', function() {
            document.getElementById('message-container').style.display = 'none';
        });
    </script>


</x-app-layout>
