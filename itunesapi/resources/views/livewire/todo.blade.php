<div class="flex flex-col mt-8">
	<div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
		<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
			<div class="flex items-center justify-between">
				<div class="max-w-lg w-full lg:max-w-xs">
					<label for="search" class="sr-only">Search</label>
					<div class="relative col-md-3">
						<input wire:model="title" wire:keydown.enter='addTodo'
							id="title"
							class="block w-full pl-10 pr-3 py-2 border-gray-300 rounded-md leading-5"
							placeholder="title" type="text"> <!--attribute class is complete -->
                            <br />
                            <button class="btn btn-primary" wire:click='addTodo'>Adicionar</button>
                        @if ($errors->has('title'))
                            <div style="color: red;">{{ $errors->first('title') }}</div>
                        @endif
                    <div>
				</div>
				<div class="relative flex items-start>
					<div class="flex items-center h-5">
						<input wire:model="active" id="active" type="checkbox"
							class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
					</div>
					<div class="ml-3 text-sm leading-5">
						<label for="active" class="font-medium text-gray-700">Active?</label>
					</div>
				</div>
			</div>
            <!--<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-4">
                    <table class="table table-striped">
-->
            
        </div>
    </div>
</div>

<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Completo?</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($todos as $todo)
                <tr class="{{ $todo->completed ? 'completed' : '' }}">
                    <th scope="row">{{ $todo->id }}</th>
                    <td> <a href="#"
                            onclick="updateTodoPrompt('{{ $todo->title }}') || event.stopImmediatePropagation()"
                            wire:click="updateTodo({{ $todo->id }}, todoUpdated)">
                            {{ $todo->title }}
                         </a>
                    </td>
                    <td>
                        @if ($todo->completed == 1)
                            Completo
                        @else
                            Incompleto
                        @endif
                    </td>
                    <td>
                        <input wire:change="toggleTodo({{ $todo->id }})" id="active" type="checkbox"
							{{ $todo->completed ? 'checked' : '' }}
                            class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                        <button class="btn btn-sm btn-danger" 
                            onclick="confirm('Você tem certeza?') || event.stopImmediatePropagation()"
                            wire:click="deleteTodo({{ $todo->id }})">&times;</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right">
            {{ $todos->links() }}
        </div>
        <br />
</div>

<script>
    let todoUpdated = '';
    
    function updateTodoPrompt(title) {
        event.preventDefault();
        
        todoUpdated = '';
        const todo = prompt('Update Todo', title);

        if (todo === null || todo.trim() === '') {
            alert('cancel or empty');
            todoUpdated = '';
            return false;
        }

        todoUpdated = todo;

        return true;
    }
</script>