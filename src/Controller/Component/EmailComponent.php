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
             $mail->MsgHTML('Nome do cliente: '.$clientName.'<br/>'
                     .'Email para contato: '. $clientEmail.'<br/>'
                     .'Idade do cliente: '. $clientAge.'<br/>'
                     .'Tem interesse em começar: '. $clientDeadline.'<br/>'
                     .'Mensagem: '.$clientMsg .'<br/>'); 

             ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
             //$mail->MsgHTML(file_get_contents('arquivo.html'));

             $mail->Send();
             return 1;

            //caso apresente algum erro é apresentado abaixo com essa exceção.
           }catch (phpmailerException $e) {
                return 0;
          }

    }

}