<?php
$send = $_POST['user'];
$USERS = array(); // for doing notifies with
$bank = new User($db);
$bank = $bank->findOneByUserName($username);
$bank = array(
'bank' => $bank->getBank(),
);
$moneyn = $_POST['money'];
$money = varscan($moneyn);
if($bank['bank']==""){
$User->setBank(0);
}

$state = $_POST['state'];
if($state == "deposit"){
if($User->getCurrency() >= $money && $money>0){
$User->subtractCurrency($money);
$add = $bank['bank']+$money;
$User->setBank($add);
$User->save();
$_SESSION['notice'] = "You have deposited ".number_format($money)."<sup>CP</sup>.";
redirect("bank");
}
else{
$_SESSION['notice'] = "You do not have enough funds to do that.";
redirect("bank");
}
}
if($state == "withdraw"){
if($bank['bank'] >= $money && $money>0){
$User->addCurrency($money);
$add = $bank['bank']-$money;
$User->setBank($add);
$User->save();
$_SESSION['notice'] = "You have withdrawn ".number_format($money)."<sup>CP</sup>.";
redirect("bank");
}
else{
$_SESSION['notice'] = "You do not have enough funds to do that.";
redirect("bank");
}
}
if($state == "wire"){
$sent = new User($db);
$sent = $sent->findOneByUserName($send);
if($sent != null){
$userid = $sent->getUserId();
if($userid != $User->getUserId())
        { 
if($bank['bank'] >= $money && $money>0){
$sendbank = $sent->getBank();
$sent->setBank($sendbank+$money);
$sent->notify("{$User->getUserName()} has sent you {$money}<sup>CP</sup>.","bank/");
$sent->save();
$add = $bank['bank']-$money;
$User->setBank($add);
$User->save();
$_SESSION['notice'] = "You have sent $send ".number_format($money)."<sup>CP</sup>.";
redirect("bank");
}
else{
$_SESSION['notice'] = "You do not have enough funds to do that.";
redirect("bank");
}
}
else{
$_SESSION['notice'] = "You cannot send money to your self.";
redirect("bank");
}
}
else{
$_SESSION['notice'] = "That user does not exist.";
redirect("bank");
}
}
if($_SESSION['notice'] == null){
$_SESSION['notice'] = "Welcome to the bank.";
}
if($_SESSION['notice'] != null)
            {
                $renderer->assign('notice',$_SESSION['notice']);
                unset($_SESSION['notice']);
}
$renderer->assign('cash',$User->getCurrency());
$renderer->assign('bank',$bank['bank']);
$renderer->assign('interest',$bank['bank']*1.05/365);
$renderer->display('user/bank.tpl');
?>
