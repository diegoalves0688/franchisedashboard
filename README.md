# Franchisedashboard

[VTEX OMS API + Google API]

Se você tem uma loja VTEX e usa UTM_SOURCE para identificar vendas provenientes de parceiros, esse projeto pode te ajudar. Com essa ferramenta você consegue liberar um dashboard, para seus parceiros acompanharem as vendas efetuadas por eles.

#Features:

1 - Informações em tempo real oriundas do OMS VTEX.<br>
2 - Fácil instalação no template do seu site.<br>
3 - Projeto OpenSource.<br>
4 - Dashboard simples, com informações diretas.<br>
5 - Visualização das vendas por período.<br>

#Pré-requisitos:

1 - Criar um email para seus parceiros (Ex: parceiro@minhaloja.com.br).<br>
2 - Utilizar UTM_SOURCE para identificar as vendas provenientes de parceiros.<br>
3 - Não utilizar o Internet Explorer.

#Criando acesso:

1º passo - Crie um perfil no seu License Manager da VTEX, liberando acesso ao OMS apenas para visualização.<br>
2º passo - Ainda no License Manager, crie um usuário para sua loja (Ex: parceiro@minhaloja.com) informando o perfil feito no passo anterior.<br>
3º passo - Acesse o OMS pela url abaixo, usando o email que você acabou de criar (altere o "minhaloja" para o seu endereço):

http://minhaloja.vtexcommercestable.com.br/admin/checkout

Clique em "login usando email e senha", digite o email criado (Ex: parceiro@minhaloja.com) e clique em "esqueci minha senha". Preencha a nova senha e continue, Você receberá nesse email um código de validação, confirme e tudo pronto!

Envie para o seu parceiro o email criado (Ex: parceiro@minhaloja.com) a senha cadastrada e a UTM_SOURCE que ele vai usar.

#Instalando em seu site:

Copie e cole o código abaixo no seu site:
```html
<a title="Login franquiado" href="#" onclick="window.open('http://franchisedashboard.primordia.com.br/', 'janela', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=800, height=700'); return false;" class="btn btn-link pull-right">
                Login franquiado
            </a>
```

Be Happy.<br>
:)
