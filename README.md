## Instalação
Para instalação do projeto é necessário ter instalado o docker junto ao docker compose
Primeiramente para rodar o projeto, clone o repositório
```sh
    git clone https://github.com/LuisCavalari/busca-endereco.git
```
Em seguida modifique o .env.example de acordo com seu ambiente e torne ele seu .env
```sh
    cp .env.example .env
```
Crie o container docker 
```sh
    docker-compose up -d --build
```
Execute o composer 
```sh
    docker exec app composer install
```
Execute o npm
```sh
    docker exec node npm install && npm run build
```
Execute as migrations 
```sh
    docker exec app php artisan migrate
```
Execute as seeds
```sh
    docker exec app php artisan db:seed
```
Por padrão a aplicação estara rodando na porta 8081, o frontend pode ser accessado em:
http://localhost:8081

## Rotas
| Método HTTP | URI |
| ------ | ------ |
| GET |   /api/address/ |
| GET |  /api/address/:id |
| POST | /api/address/ |
| PUT | /api/address/:id |
| DELETE | /api/address/:id |
| GET | /api/address/fuzzy-search?search_term=term |
| GET | /api/address/search-by-zip-code/:zipcode |

### Exemplo de payload para endpoint de criação
```json
 {
        "street": "Avenida São João",
        "neighborhood": "Vila Joana",
        "city": "Jundiaí",
        "state": "SP",
        "country": "BR",
        "zip_code": "13216000"
    }
```
