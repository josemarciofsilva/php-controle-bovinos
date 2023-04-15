# php-controle-bovinos

Sistema para um teste de vaga para empresa DFRanquias - Desenvolvido em PHP com Symfony.

Este sistema foi pensado e elaborado com conceito de DDD aplicado no framework Symfony, portanto as estruturas das pastas estão diferentes do padrão Symfony no ato da instalação.

# Regra de Negócio

Requisitos Funcionais que o sistema apresenta:
Cadastro, Edição, Deleção, Listagem e Visualização do gado da fazenda, manipulando os seguintes dados:
* Código: código da cabeça de gado;
* Leite: número de litros de leite produzido por semana;
* Ração: quantidade de alimento ingerida por semana - em quilos;
* Peso: peso do animal em quilos;
* Nascimento: data de nascimento do animal.

Pode haver apenas um animal vivo com o mesmo código.
A data de nascimento não pode ser apresentada como futura.
Relatório de animais para abate, sendo que um animal poderá ser enviado para abate quando atinge as seguintes condições:
* Possui mais de 05 anos de idade;
* Produza menos de 40 litrso de leite por semana;
* Produza menos de 70 litros de leite por semana e ingita mais de 50 quilos de ração por dia;
* Possui peso maior que 18 arrobas

  * Utilize o item anterior para mandar os animais para o abate (o sistema só permite o abate de
animais que se enquadre em pelo menos uma das condições citadas no item anterior);
* Relatório de animais abatidos;
* Relatório da quantidade total de leite produzido por semana (Tela inicial);
* Relatório da quantidade total de ração necessária por semana (Tela inicial);
* Relatório da quantidade total de animais que tenham até 1 ano de idade e que consumam mais
de 500Kg de ração por semana (Tela inicial).

