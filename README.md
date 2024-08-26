# Sistema de Gestão Hospitalar
Sistema de Gestão Hospitalar feito para disciplina de Tópicos em Computação II

## Instruções para rodar

* Pré-requisitos:
    - Docker
    - Make

O primeiro passo é baixar os arquivos do repositório, para isso rode:
```bash
git clone https://github.com/diego3s/gestaohospitalartc2.git <nome-de-pasta-desejado>
cd <nome-de-pasta-desejado>
```

Após isso, execute o seguinte comando:
```bash
make completeRun
```
Esse comando primeiramente fará a cópia do arquivo .env.example para o .env, posteriormente fará o build das imagens dos containers, subir os containers, instalará o composer no container PHP, gerará a key do artisan e rodará as migrations.

> [!IMPORTANT]  
> Lembre-se de alterar o nome, o usuário e a senha do banco de dados no arquivo src/.env. Para isso altere também o arquivo .env na raiz do projeto.

#### O projeto estará disponível no endereço: localhost ou 127.0.0.1.
