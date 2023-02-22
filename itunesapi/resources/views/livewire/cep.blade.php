<div>
    <div>
       @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <br/>
        <div class="form-group mx-sm-3 mb-2">
            <label for="cep" class="sr-only">CEP</label>
           <!-- <input wire:change='buscaCep($event.target.value)' type="text" class="form-control" id="cep" name="cep" placeholder="Cep"> --> 
            <input wire:model.defer='pesquisa' type="text" class="form-control" id="cep" name="cep" placeholder="Cep">
            <button wire:click='buscaCep' class="btn btn-primary mb-2">Pesquisar</button>
        </div>
         
        <div class="container">
            <div class="row">
                <input wire:model='logradouro' type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro" disabled />
                <input wire:model='bairro' type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" disabled/>
                <input wire:model='cidade' type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" disabled/>
                <input wire:model='estado' type="text" class="form-control" id="estado" name="estado" placeholder="Estado" disabled/>
            </div>
            <br/>
        </div>
</div>
 