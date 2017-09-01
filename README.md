# CotacaoBTC
Simples Client CLI para consulta de preços em diversas exchanges de BTC nas suas respectivas moedas

## Requerimentos

* SqLite Driver
* cURL

Para instalação do SQLite e cURL no Ubuntu com PHP7:

```
$ sudo apt-get install php7.0-sqlite3
$ sudo apt-get install php7.0-curl
```

## Instalação


Acesse a pasta

```sh
$ cd CotacaoBTC/examples
```

Rode o seguinte comando

```sh
$ php install.php
```

## Utilização

Rode o php chamando o arquivo de cotacao de exemplo seguido do código iso da moeda:

```sh
$ php cotacao.php codigoISO
```

Para verificar cotações de exchanges que trabalham com Dólares

```sh
$ php cotacao.php usd
```

Para verificar cotações de exchanges que trabalham com Reais

```sh
$ php cotacao.php brl
```

Para verificar cotações da maior parte das exchanges espalhadas pelo mundo

```sh
$ php cotacao.php
```


