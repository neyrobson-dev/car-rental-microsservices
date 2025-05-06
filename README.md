# 🚗 API - Locadora de Automóveis (Laravel + Microsserviços)

Este projeto é uma arquitetura de microsserviços usando Laravel e Docker, voltado para gerenciar uma locadora de automóveis. O sistema é composto por múltiplos serviços independentes que se comunicam via API Gateway, com autenticação JWT, filas e clean code aplicado.

---

## 📦 Serviços

- **Auth Service**: Gerencia autenticação e cadastro de usuários.
- **Fleet Service**: Gerencia a frota de veículos disponíveis para locação.
- **Booking Service**: Responsável pelas reservas e locações.
- **Notification Service**: (Em construção) Para envio de notificações e e-mails.
- **API Gateway**: Centraliza as requisições, roteia para os serviços e repassa o token JWT.

---

## 🧱 Tecnologias e Conceitos

- Laravel 10.x
- Docker + Docker Compose
- JWT Auth (Laravel Sanctum)
- Clean Code / Service Layer
- RESTful API
- Microsserviços independentes
- Comunicação entre serviços via HTTP
- Autenticação centralizada via Gateway

---

## 🚀 Como rodar o projeto

### 1. Clone o repositório

git clone https://github.com/seu-usuario/nome-do-repo.git
cd nome-do-repo

### 2. Suba os serviços com Docker

docker-compose up --build

### 3. Acesse os serviços

| Serviço       | Porta Local | URL Exemplo                                    |
| ------------- | ----------- | ---------------------------------------------- |
| API Gateway   | `8004`      | [http://localhost:8004](http://localhost:8004) |
| Auth Service  | `8001`      | [http://localhost:8001](http://localhost:8001) |
| Fleet Service | `8002`      | [http://localhost:8002](http://localhost:8002) |


### 📂 Estrutura de Pastas

/auth-service
/fleet-service
/booking-service
/notification-service
/api-gateway
/docker-compose.yml

### 👨‍💻 Autor

Desenvolvido por Ney Robson com foco em arquitetura moderna, boas práticas e escalabilidade com Laravel.

### 📄 Licença
Este projeto está sob a licença MIT.
