# 🚀 Validador de Cartões com BIN List e Algoritmo de Luhn

Este projeto é um **validador de cartões de crédito** que utiliza o **Algoritmo de Luhn** e consulta informações do **BIN List**. Ele é composto por:

- `index.php` → Interface para validar números de cartão
- `Database.php` → Classe para buscar informações do banco de dados
- `api.php` → Endpoint para consulta via API (`127.0.0.1/api.php?number=`)

---

## 🔧 Tecnologias Utilizadas

- PHP
- SQLite (`base.db` para armazenar informações do BIN List)
- cURL (para consultas externas caso o BIN não esteja no banco local)

---

## 📌 Estrutura do Projeto

```
📂 binlist-validator/
├── 📄 index.php          # Interface para validação
├── 📄 api.php            # Endpoint para consulta
├── 📄 Database.php       # Classe que busca dados no banco de dados
├── 📂 data/              # Arquivos de dados do BIN List (opcional)
└── 📄 README.md          # Documentação do projeto
```

---

## 🛠️ Instalação e Uso

1️⃣ Clone este repositório:

```bash
git clone https://github.com/seuusuario/binlist-validator.git
cd binlist-validator
```

2️⃣ Configure o banco de dados SQLite (`base.db`).

3️⃣ Configure a conexão no arquivo `Database.php`.

4️⃣ Inicie um servidor local:

```bash
php -S 127.0.0.1:8000
```

5️⃣ Acesse a interface em:

```
http://127.0.0.1/index.php
```

Ou consulte diretamente a API:

```
http://127.0.0.1/api.php?number=411111
```

---

## 🔄 Como Funciona?

### 🔹 Algoritmo de Luhn (Validação de Cartão)

O sistema verifica se um número de cartão é válido aplicando o **Algoritmo de Luhn**.

### 🔹 Consulta ao BIN List

1️⃣ **Verifica no banco de dados local (`base.db`)** se o BIN já existe.
2️⃣ **Se não encontrar, consulta uma API externa** para buscar as informações.

As informações retornadas incluem:
- Bandeira (Visa, Mastercard, etc.)
- Tipo (Crédito/Débito)
- Banco emissor
- País de origem

---

## 📌 Exemplo de Resposta da API

```json
{
  "valid": true,
  "bin": "411111",
  "brand": "Visa",
  "type": "Credit",
  "bank": "Chase Bank",
  "country": "US"
}
```

---

## 📜 Licença

Este projeto está sob a licença **MIT**. Sinta-se à vontade para usar e modificar! 😃

---

## 🤝 Contribuição

Se quiser contribuir, sinta-se à vontade para abrir uma **issue** ou enviar um **pull request**! 🚀
