# Projeto Editora Virtual

## Introdução

Este projeto serve de base para o aprendizado de algumas funcionalidades do framework Laravel.

## Passos

### 1. Revisão da versão do PHP e módulos instalados

```bash
php -v # mostra a versão do PHP
php -m # lista os módulos instalados no PHP
```

```bash
PHP >= 7.1.3
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Ctype PHP Extension
JSON PHP Extension
php-zip
BCMath PHP Extension
```

### 2. Instalação do Laravel através do Composer

```bash
composer global require laravel/installer
```

### 3. Criando o Projeto

```bash
laravel new 'cadastro-assinantes'
# ou
composer create-project laravel/laravel cadastro-assinante --prefer-dist
```

### 4. Testando o projeto criado e visualizando a página inicial

```bash
php artisan serve
# accessar http://localhost:8000 no navegador
```

### 5. Configuração da base de dados MySQL

Fazer ajustes no arquivo `.env`.

### 6. Criação da model e migration

```bash
php artisan make:model Assinante -m
```

### 7. Adicionar campos necessários na migration e rodar a migration

```bash
php artisan migrate
```

### 8. Criação do controller

```bash
php artisan make:controller Assinante -r -m=Assinante
```
### 9. Adicionar e testar a rota para o controller

```php
<?php

// routes/web.php
Route::resource('assinante', 'AssinanteController');
```

### 10. Criação de uma factory para a model

```bash
php artisan make:factory AssinanteFactory -m=Assinante
```
Dica colocar $faker = \Faker\Factory::create('pt_BR'); 
** traz alguns nomes em portugues

### 11. Criação dos mutators e acessors (métodos getFooAttributes e setFooAttributes)

Estes métodos são necessários para converter o formato dos campos que vieram da requisição HTTP para o formato esperado pelo banco de dados e vice-versa.

```php
    public function getDataNascimentoAttribute($value)
    {
        $date = \DateTime::createFromFormat('Y-m-d', $value);
        $dateString = $date->format('d/m/Y');
        return $dateString;
    }

    public function setDataNascimentoAttribute($value)
    {
        $date = \DateTime::createFromFormat('d/m/Y', $value);
        $dateString = $date->format('Y-m-d');

        $this->attributes['data_nascimento'] = $dateString;
    }
```

### 12. Testar a factory no tinker

```bash
php artisan tinker
```

```bash
App\Assinante::make(1); # cria e exibe uma model na memória
App\Assinante::create(1); # cria e persiste uma model na base de dados
```
  
### 13. Criação dos seeds para população dos dados na base de dados

```bash
php artisan make:seeder AssinantesTableSeeder
```

### 14. Criação do formulário de listagem

Construir um tabela com os dados criados pela factory model e adicionar botões de ação como criar, visualizar, editar e remover.

```html
<table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assinantes as $assinante)
            <tr>
                <td>{{ $assinante->id }}</td>
                <td>{{ $assinante->nome }}</td>
                <td>{{ $assinante->email }}</td>
                <td>
                    <a href="{{ route('assinantes.show', ['id' => $assinante->id]) }}" class="btn btn-outline-primary btn-sm">visualizar</a>
                    <a href="{{ route('assinantes.edit', ['id' => $assinante->id]) }}" class="btn btn-outline-primary btn-sm">editar</a>
                    <form action="{{ route('assinantes.destroy', ['id' => $assinante->id]) }}" method="POST" style="display: inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm" onclick="javascript: return confirm('Você deseja realmente apagar este assinante?')">remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

```

### 15. Adicionar estilos do Bootstrap na listagem

Utilizar classes do Bootstrap para o menu de navegação, botões e tabela.
  
### 16. Adicionar paginação na listagem

Adicionar o método `paginate(10)` na consulta e no template incluir `{{ $assinantes->links() }}` para adicionar a marcação necessária para o paginador.

### 17. Criação de um Repository

Pensar nas listas, combos, radios que o formulário terá. Foi criado um objeto para conter todos os estados, tipos de logradouro, interesses, de forma a simplificar o blade.

### 18. Criação do formulário de 'Inserção' com os tipos corretos de cada campo

Utilizar na `action` do formulário o helper `route()` do Laravel e como argumento o nome da rota `assinantes.store`.

Vale lembrar de utilizar o atributo `novalidate` do HTML para desativar a validação de formulário do navegador.

Lembrar de adicionar no formulário as diretivas `@csrf`.

```html
<form action="{{ route('assinantes.store') }}" method="POST" novalidate>
    @csrf
```

Utilizar as classes do Bootstrap para organizar os elementos do formulário na tela de uma forma mais agradável para o usuário.

```html
<div class="form-group row">
    <label for="nome" class="col-4 col-form-label">Nome</label>
    <div class="col-7">
        <input type="text" name="nome" id="nome" class="form-control" maxlength="50" value="{{ old('nome', $assinante->nome ?? '') }}">
    </div>
</div>
```

### 19. Criar validação de campos do formulário

Recomenda-se utilizar um objeto separado para fazer a validação. Isso permite a reutilização da regra de validação e torna o controller mais enxuto.

```bash
php artisan make:request StoreAssinanteRequest
```

A validação é incluída na classe `StoreAssinanteRequest` no método `rules()`.

Nesta validação foram colocados todas as regras a serem consideradas como `unique`, `max`, `array`, `required` entre outros.
> Configurar os Rules específicos para os campos em que o padrão nao é suportado
```sh
php artisan make:rule Cep
```
dica prestar atenção nas aspas duplas
     'codigo'    => "required|max:3|unique:revistas,codigo,$id,id|max:3|min:3"
     
### 20. Criar uma versão traduzida para o idioma `pt-br` das mensagens de validação

Criar arquivo em *resources/lang/pt-br/validation.php* e realizar as traduções.

### 21. Adicionar mensagens de feedback na página de 'Inserção'

Realizar uma verificação para checar a existência de erros e exibir cada um dos erros em uma lista.

```html
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

### 22. Validar o fluxo de funcionamento da listagem e da página de 'Inserção'

Testar mensagens de erros, mensagens de retorno e redirecionamentos.
  
### 23. Criação do formulário de 'Edição'

Observar como os campos vêm da base de dados e como eles devem ser colocados no HTML.

### 24. Criar o validador do formulário de 'Edição'

Semelhante ao formulário de criação o formulário de edição pode ter algumas diferenças tais como: Permitir que o campo email já esteja base de dados "desde que seja do mesmo assinante"

### 25. Revisar mensagens de erros para o feedback

Podem ser diferentes, "dica utilize a mesma seção do formulário de inserção assim você nao precisa tratar os erros na blade

### 26. Criação do formulário de 'visualização'

Apenas mostre os campos no sistema, não permita nenhuma alteração neles.

Não há necessidade do formulário ser exatamente igual ao de criação/edição, mostre os campos checkbox, listas, option, rádio, no formato texto simplificando que lê a informação.

Concatene os campos que podem ser exibidos de uma só vez tais como tipo de logradouro + logradouro + numero

Adicionar um botão de voltar

Atentar-se para que o formulário não deve conter uma action "valendo"

Exibir os campos input com o atributo de readonly ou disabled.

### 27. Remoção do assinante
O Laravel trabalha o método destroy um pouco diferente método editar Update ou Store, é necessário dizer ao Láravel que queremos remover o registros. Para isso colocamos a diretiva `@method('DELETE')`
dentro de um formulário específico, isto informa que ao controller que queremos acessar o método destroy. Vale a dica de confirmar a exclusão, pois na maioria dos casos não tem como recuperar o registro.


### 28. Extrair mensagens e menus para partials

Separar os formulários em pequenos pedaços com o objetivo de reaproveitá-los, por exemplo
layout.blade.php -> principal contendo os estilos e javascript
form.blade.php -> somente formulario - assim ele servirá para o edição e criação
exemplo do fomulário create

```html
@extends('layouts.app') <!-- contém o styles+css+javascript -->

@section('content')  <!--  corpo do html -->
    <h1 class="h2 mb-2">Novo Assinante</h1>

    @include('assinante.error') <!-- mensagens de feedback de erros -->

    <form action="{{ route('assinantes.store') }}" method="POST" novalidate>
        @csrf
        @include('assinante.form')  <!-- formulário com os input type, rádios, checkbox, etc -->
        <div class="form-action">
            <input type="submit" value="Cadastrar" class="btn btn-lg btn-primary">
        </div>
    </form>
@endsection
```

### 29. Adicionar máscaras aos campos

Máscaras são importantes pois auxiliam a visualização da informação que está no campo e ajuda o usuário no seu preenchimento.

### 30. PlaceHolder
Coloque PlaceHolder onde o usuário pode ter dúvidas de como preencher o campo, por ex: cep 02435-090, cpf 141.547.141-58

### 31. Helpers
O Helpers são pequenas mensagens que auxiliam o usuário de como preencher específicas, por ex: "preencher no mínimo 3 interesses".

### 32. Validação da navegação completa
Valide cada para do sistema, teste unitário
Valide todo o sistema, teste completo.
Peça a outra pessoa para testar você se surpreenderá com que os usuários conseguem fazer.
