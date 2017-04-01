<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

use PHPMailer\PHPMailer;

require_once(ROOT .DS. "vendor" . DS  . "phpmailer" . DS . "PHPMailer.php");


class EmailComponent extends Component
{
    public function emailToTrainer($trainerEmail, $trainerName, $clientEmail, $clientName, $clientAge, $clientMsg, $clientDeadline){
        
        // Inicia a classe PHPMailer
        $mail = new PHPMailer(false);

        // Define os dados do servidor e tipo de conexão
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsSMTP(); // Define que a mensagem será SMTP

        try {
             $mail->Host = 'mail.trainerlink.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
             $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
             $mail->Port       = 587; //  Usar 587 porta SMTP
             $mail->Username = 'automatico@trainerlink.com.br'; // Usuário do servidor SMTP (endereço de email)
             $mail->Password = 'alr2016automatico'; // Senha do servidor SMTP (senha do email usado)
             $mail->CharSet = 'utf-8';


             //Define o remetente
             // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
             $mail->SetFrom('automatico@trainerlink.com.br', 'Contato Trainer Link'); //Seu e-mail
             $mail->AddReplyTo('automatico@trainerlink.com.br', 'Contato Trainer Link'); //Seu e-mail
             //TODO tem algum problema quando utiliza caracteres especiais no assunto do email
             $mail->Subject = 'Contato de cliente';//Assunto do e-mail


             //Define os destinatário(s)
             //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
             $mail->AddAddress($trainerEmail, $trainerName);

             //Campos abaixo são opcionais 
             //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
             //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
             //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
             //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


             //Define o corpo do email
             $mail->MsgHTML($this->generateStringHtml($clientName, $clientEmail, $clientAge, $clientDeadline, $clientMsg)); 

             ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
             //$mail->MsgHTML(file_get_contents('arquivo.html'));

             $mail->Send();
             return 1;

            //caso apresente algum erro é apresentado abaixo com essa exceção.
           }catch (phpmailerException $e) {
                return 0;
          }

    }
    
    private function generateStringHtml($clientName, $clientEmail, $clientAge, $clientDeadline, $clientMsg){
        $deadline = [ '', 'Nos próximos dias','Nas próximas semanas','Estou apenas pesquisando'];
        return "<!DOCTYPE html>
<html lang=\"en\"><head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\">
    <meta charset=\"utf-8\">
    <meta name=\"robots\" content=\"noindex\">

    <title>Trainer Link - Contato cliente</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <style type=\"text/css\">

body {
    padding: 0;
    margin: 0;
}

html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
@media only screen and (max-device-width: 680px), only screen and (max-width: 680px) { 
    *[class=\"table_width_100\"] {
		width: 96% !important;
	}
	*[class=\"border-right_mob\"] {
		border-right: 1px solid #dddddd;
	}
	*[class=\"mob_100\"] {
		width: 100% !important;
	}
	*[class=\"mob_center\"] {
		text-align: center !important;
	}
	*[class=\"mob_center_bl\"] {
		float: none !important;
		display: block !important;
		margin: 0px auto;
	}	
	.iage_footer a {
		text-decoration: none;
		color: #929ca8;
	}
	img.mob_display_none {
		width: 0px !important;
		height: 0px !important;
		display: none !important;
	}
	img.mob_width_50 {
		width: 40% !important;
		height: auto !important;
	}
}
.table_width_100 {
	width: 680px;
}

.btn-trainer {
    background-color: #00BECE;
}

.btn-input {
    color: white;
    font-weight: 900;
}

.btn-conf-2 {
    border-radius: 5px;
    margin-right: 15px;
    font-size: 11px;
    letter-spacing: 1px;
    padding: 12px 28px 11px 28px;
    margin-top: 20px;
}



.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
    </style>

</head>
<body>

<div id=\"mailsub\" class=\"notification\" align=\"center\">

<table style=\"min-width: 320px;\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\"><tbody><tr><td bgcolor=\"#fafafa\" align=\"center\">



<table class=\"table_width_100\" style=\"max-width: 680px; min-width: 300px;\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\">
    <tbody><tr><td>
	<!-- padding --><div style=\"height: 80px; line-height: 80px; font-size: 10px;\">&nbsp;</div>
	</td></tr>
	<!--header -->
	<td bgcolor=\"#000\" align=\"center\">
		<!-- padding --><div style=\"height: 30px; line-height: 30px; font-size: 10px;\">&nbsp;</div>
		<table cellspacing=\"0\" cellpadding=\"0\" width=\"90%\" border=\"0\">
			<tbody><tr><td align=\"center\"><!-- 

				Item --><div class=\"mob_center_bl\" style=\"display: inline-block; width: 115px;\"> 
						<img src=\"http://trainerlink.com.br/trainerlink/img/logo.png\" alt=\"Trainer Link\" title=\"Trainer Link\" />
					</div><!-- Item END--><!--[if gte mso 10]>
					</td>
					<td align=\"right\">
				<![endif]--><!-- 

				Item --><!-- Item END--></td>
			</tr>
		</tbody></table>
		<!-- padding --><div style=\"height: 30px; line-height: 30px; font-size: 10px;\">&nbsp;</div>
	</td>
	<!--header END-->

	<!--content 1 -->
	<tr><td bgcolor=\"#ffffff\" align=\"center\">
		<table cellspacing=\"0\" cellpadding=\"0\" width=\"90%\" border=\"0\">
			<tbody><tr><td align=\"center\">
				<!-- padding --><div style=\"height: 60px; line-height: 60px; font-size: 10px;\">&nbsp;</div>
				<div style=\"line-height: 44px;\">
					<font style=\"font-size: 34px;\" color=\"#414142\" size=\"5\" face=\"Arial, Helvetica, sans-serif\">
					<span style=\"font-family: Arial, Helvetica, sans-serif; font-size: px; color: #000;\">
						Contato de cliente
					</span></font>
				</div>
				<!-- padding --><div style=\"height: 40px; line-height: 40px; font-size: 10px;\">&nbsp;</div>
			</td></tr>
			<tr><td align=\"center\">
				<div style=\"line-height: 24px;\">
					<font style=\"font-size: 15px;\" color=\"#57697e\" size=\"4\" face=\"Arial, Helvetica, sans-serif\">
					<span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;\">
						O usuário <strong> ". $clientName ." </strong> entrou em contato com você para solicitar informação<br> sobre os seus serviços.
					</span></font>
				</div>
				<!-- padding --><div style=\"height: 60px; line-height: 60px; font-size: 10px;\">&nbsp;</div>
			</td></tr>
		</tbody></table>		
	</td></tr>
	<!--content 1 END-->

	<!--content 2 -->
	<tr><td style=\"border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4; border-top-width: 1px; border-top-style: solid; border-top-color: #eff2f4;\" bgcolor=\"#ffffff\" align=\"center\">
		<table cellspacing=\"0\" cellpadding=\"0\" width=\"94%\" border=\"0\">
			<tbody><tr><td align=\"left\">
				<!-- padding --><div style=\"height: 40px; line-height: 40px; font-size: 10px;\">&nbsp;</div>
				<div style=\"line-height: 24px;\">
					<font style=\"font-size: 15px;\" color=\"#57697e\" size=\"4\" face=\"Arial, Helvetica, sans-serif\">
					<span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #414142;\">
						<strong>Nome: </strong> ". $clientName ." <br/>
						<strong>Idade: </strong> ". $clientAge ." <br/>
						<strong>E-mail: </strong> ". $clientEmail  ."<br/>
						<strong>Quando deseja começar as atividades:</strong> ". $deadline[$clientDeadline] ."<br/>
						<strong>Mensagem: </strong> ". $clientMsg ."<br/>
					</span></font>
					<!-- padding --><div style=\"height: 40px; line-height: 40px; font-size: 10px;\">&nbsp;</div>
					<center>
						<div style=\"font-family: Arial, Helvetica, sans-serif; font-size: 15px;\" class=\"btn btn-conf-2 btn-input btn-trainer\"><strong>Conselho:</strong> Responda o mais rápido possível e consiga mais clientes.</div>
					</center>
				</div>
			
												
			</td></tr>
			<tr><td>				<!-- padding --><div style=\"height: 40px; line-height: 40px; font-size: 10px;\">&nbsp;</div>
</td></tr>
		</tbody></table>		
	</td></tr>
	<!--content 2 END-->

	<!--footer -->
	<tr><td class=\"iage_footer\" bgcolor=\"#ffffff\" align=\"center\">
		<!-- padding --><div style=\"height: 30px; line-height: 30px; font-size: 10px;\">&nbsp;</div>	
		
		<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\">
			<tbody><tr><td align=\"center\">
				<font style=\"font-size: 13px;\" color=\"#96a5b5\" size=\"3\" face=\"Arial, Helvetica, sans-serif\">
				<span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;\">
					Caso queira realizar alguma modificação em seu cadastro acesse <a href=\"http://trainerlink.com.br/trainerlink/users/login\">seu perfil</a> <br>
								Trainer Link. Todos os direitos reservados 2017
				</span></font>				
			</td></tr>			
		</tbody></table>
		
		<!-- padding --><div style=\"height: 30px; line-height: 30px; font-size: 10px;\">&nbsp;</div>	
	</td></tr>
	<!--footer END-->
	<tr><td>
	<!-- padding --><div style=\"height: 80px; line-height: 80px; font-size: 10px;\">&nbsp;</div>
	</td></tr>
</tbody></table>
<!--[if gte mso 10]>
</td></tr>
</table>
<![endif]-->
</td></tr>
</tbody></table>
</body></html>";
    }

}