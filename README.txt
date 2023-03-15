README (pt-br)

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


README (en-us)

In the "conexao.php" file, the localhost user is "root" and the password is empty. This setting may change depending on the settings made on your computer.

The relationship of forum's and answer's tables is 1xn. In 1 forum the user can make n answers.

In the "usuario" table of the database, there is the "perfil" attribute that identifies whether the user is an ordinary person or an administrator.
To ensure security, the administrator login can only be created directly in the database when "adm" is placed in the "perfil" attribute.

Pages "login_verificar.php" and login_verificar_adm.php" check if the user is regular or administrator.
When called in other pages, the content will be shown according to the login. For example, a user without login can only view the forums, but cannot create or delete them. An ordinary user, logged in, will be able to create and delete the OWN forums and not those of other users. The administrator will be able to create forums and also delete the forums of ANY user.

If any common user or not logged in tries to bypass the login and enter in the admin profile page url, he will be thrown directly
to the homepage(index.php).
