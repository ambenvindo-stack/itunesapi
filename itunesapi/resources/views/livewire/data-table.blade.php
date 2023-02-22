<div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col"><button wire:click="sortBy('name')">Nome</button></th>
        <th scope="col"><button wire:click="sortBy('email')">Email</button></th>
        <th scope="col">Active</th>
        <th scope="col">Criado em</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if ($user->active == 1)
              Ativo
            @else
              Inativo
            @endif
          </td>
          <td>{{ $user->created_at }}</td>
        </tr>
      @endforeach
     </tbody>
  </table>
  <div class="float-right">
    {{ $users->links() }}
  </div>
  <br />
</div>