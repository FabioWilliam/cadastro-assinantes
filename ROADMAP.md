# Roadmap
### Revistas
* finalizar StoreRequestRevista
* Verificar Bootstrap do campo File

### Assinantes
* Adicionar mensagem se o registro não for gravado no banco de dados
>

* (OK) Adicionar o 'old' aos campos 'sexo', 'tipo de logradouro', 'estado', 'interesses' e 'aceita receber informações'
* (OK) Colocar Estados e Logradouros em um repositório
* (OK) Adicionar placeholder aos campos necessários
* (OK) Transformar campo e-mail como único
* (OK) Criar classe de seed para Assinantes
* (OK) Implementar paginação na página de listagem
* (OK) Melhorar a disposição dos campos da página de criação
* (OK) Alterar a factory para adicionar os tipos de logradouro corretos
* (OK) Trazer o valor dos campos 'estado', 'interesses' e 'aceita receber' na página de edição
* (OK) Formatar o campo 'data de nascimento' na página de edição
* (OK) Corrige funcionamento do menu da aplicação
* (OK) Melhora o layout do formulário
* (OK) Extrair o menu de 'app' para um partial específico (nav)
* (OK) Extrair bloco de erros do formulário de assinantes 
* (OK) Adicionar um helptext do Bootstrap no campo interesse com a seguinte mensagem 'Escolha pelo menos 3 interesses'
* (OK) Adicionar texto para campos opcionais no formulário
* (OK) Adicionar encriptação no campo de senha
* (OK) Implementar página de edição
* (OK) Corrigir a regra de geração de datas de nascimento no factory de acordo com regra de validação (de 18 a 80 anos) vai precisar gerar eu mesmo uma data 
* (OK) Implementar ação de remoção
* (OK) Implementar página de visualização metodo show
* Adicionar máscaras aos campos necessários
* (OK) Remover máscara do valor da visualização de revistas e colocar formatação na view
* (OK) Alinhar o valor à esquerda e colocar R$ no início do valor
* (OK) Adicionar a imagem da capa em uma div e aumentar o tamanho da imagem para 120px
* (OK) Alinhar o valor à esquerda e colocar R$ no início do valor da máscara na página de edição e criação 
03/04/19
* (OK) Tratar o status da Assinatura na index.blade
* (OK) Criar um Repository para as revistas, alterar o AssinaturasController
* (OK) Estudar o Jquery para consultar o assinante pelo nome no cadastramento da assinatura
* (OK) Implementar a injeção de dependencia nos métodos controler de assinaturas
* (OK) Tratar o Unique no codigo da Revista, (Factory)
* (OK) Tratar a exclusão de um assinante, pode ser que ele tenha uma assinatura atrelada a este assinante neste caso o cliente não pode ser excluido
* (OK) Inibir o campo Valor da Revista na tela de assinatura, trazer o valor quando o usuário escolher uma revista utilizando o campo Revista.
* (OK) remover página inicial
* (OK) colocar página de login como página inicial
* (OK) traduzir os elementos visuais da página de login
* (OK) traduzir os elementos visuais da página de cadastro
* (OK) traduzir as mensagens de validação do cadastro de usuário
* (OK) fazer funcionar a recuperação de e-mail
