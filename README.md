# **Trilha de Exercícios – PHP + MySQL**
# **Syspan (Locação de Máquinas)**

Projeto desenvolvido para prática de estudos em PHP, contendo exercícios introdutórios e um mini-sistema inspirado nos sistemas da Syspan. O sistema permite o gerenciamento de clientes, equipamentos e contratos de locação.

## **Tecnologias utilizadas**
- PHP (PDO)
- MySQL
- HTML + CSS
- XAMPP (ou similar)

## **Estrutura**
- `aula01-php/`: fundamentos de PHP (variáveis, condições, laços e funções).
- `aula02-form/`: formulários com GET/POST e validações.
- `aula03-sql/`: script SQL para criação do banco e consultas.
- `prints/`: capturas de tela dos exercícios e do sistema.
- `projeto-locacao/`: mini-sistema completo de locação.

## **Como executar o projeto**

### **1. Clone o repositório**
```bash
git clone https://github.com/thamiresvianna/syspan-estagio.git
```

### **2. Configure o ambiente**
- Instale o XAMPP (ou outro servidor com PHP + MySQL).
- Copie o projeto para a pasta `htdocs`.

### **3. Crie o banco de dados**
No phpMyAdmin ou MySQL, execute:
```sql
CREATE DATABASE syspan_locacao_estagio;
```

### **4. Crie as tabelas**
Execute o script:
```bash
aula03-sql/locacao.sql
```

### **5. Configure a conexão**
Abra o arquivo:
```bash
projeto-locacao/conexao.php
```

Ajuste usuário e senha do MySQL, se necessário:
```php
$host = '127.0.0.1';
$porta = '3306';
$banco = 'syspan_locacao_estagio'; 
$usuario = 'root'; 
$senha = '';
```

### **6. Execute no navegador**
Acesse:
```bash
http://localhost/syspan-estagio/
```

### **7. Visualizando exercícios**
- Acesse as pastas `aula01-php/` e `aula02-form/` para executar os exercícios. 
- Visualize as imagens em `prints/`.

### **8. Projeto Locação**
- Acesse `projeto-locacao/`.
- Navegue pelo sistema testando as funcionalidades.

## Autora

**Thamires Vianna**

GitHub: https://github.com/thamiresvianna