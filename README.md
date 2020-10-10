<p align="center">
  <img width="300" height="200" img src="https://gifimage.net/wp-content/uploads/2018/11/vehicle-loading-gif-9.gif"/>
</p>

<p align="center">
    <a href="https://github.com/reinanhs" alt="MadeBy">
        <img src="https://img.shields.io/badge/made%20by-Reinan%20Gabriel-blue" /></a>
    <a href="https://github.com/reinanhs/gerenciar-veiculos/blob/master/README.md" alt="License">
        <img src="https://img.shields.io/badge/license-MIT-blue" /></a>
</p>

<p align="center">
    :droplet: Sistema em Laravel para gerenciamento de veículos de uma empresa :droplet: 
</p>
<p align="center">
  :star: Contributor :star:
</p>
<p align="center">
  <a href="https://github.com/ReinanHS">
      <img width="50" height="50" src="https://github.com/reinanhs.png">
  </a>
</p>

# Gerenciar Veiculos

Desenvolver um sistema em Laravel para gerenciar os veículos de uma empresa, com as serguintes funcionalidades:

- Crud de veículo com os seguintes dados:
	- Placa
	- Modelo
	- Marca
	- Status(Disponível, Quebrado ou em Manutenção)
	- Chassi
- Salvar um histórico do status do veículo toda vez que esse status for alterado;
- Validar que o chassi e a placa do veículo não podem se repetir e deverão ser obrigatórios;
- Permitir filtrar o veículo por todos os campos;
- Solicitar que o usuário adicione uma observação quando alterar o status, essa, observação será salva junto com o novo histórico de status lançado;

## Instalando e atualizando as dependências via composer:

Clone o repositório no meu Github
`git clone https://github.com/ReinanHS/gerenciar-veiculos.git`

Após ter feito o clone entre as pastas do projeto e instalar as dependências:
```sh
composer install
npm install
npm run dev
```

Faça uma cópia do arquivo .env.example para .env e modifique os arquivos com as configurações de seu ambiente de desenvolvimento.

logo depois, execute o comando php artisan key:generate para criar um token para sua aplicação

Estabelecendo uma conexão com o banco de dados e criando as migrations: 

```sh
php artisan migrate:install
php artisan migrate:refresh
```

Antes de abrir o site no navegador, configure um host virtual apontando para a pasta `/public`
