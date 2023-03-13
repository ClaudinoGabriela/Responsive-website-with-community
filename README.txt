README

No arquivo "conexao.php", o usuário do localhost está como "root" e a senha está vazia. Esta configuração pode mudar, dependendo das configurações
feitas em seu computador.

A relação das tabelas de criação de fórum e de respostas é 1xn. Em 1 fórum o usuário pode fazer n respostas.

Na tabela "usuario", do banco de dados, existe o atributo "perfil" que identifica se o usuário é uma pessoa comum ou o administrador. Para garantir
a segurança, o login do administrador só pode ser criado diretamente no banco de dados quando colocado "adm" no atributo "perfil".

As páginas "login_verificar.php" e login_verificar_adm.php" verificam se o usuário é comum ou administrador. Quando chamadas em outras páginas,
o conteúdo será mostrado de acordo com o login. Por exemplo, um usuário sem login pode apenas vizualizar os fóruns, mas não pode criá-los e nem
excluí-los. Um usuário comum, logado, poderá criar e excluir os PRÓPRIOS fóruns e não os de outros usuários. Já o administrador poderá criar fóruns
e também excluir os fóruns de QUALQUER usuário.

Se algum usuário comum ou não logado tentar burlar o login e digitar a url da página do administrador ou do perfil, ele será jogado diretamente
para a página inicial(index.php).
