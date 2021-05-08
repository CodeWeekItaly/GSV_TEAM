<?php
if(!isset($_GET['page'])){
    include './public/page/home.php';
}else{
    switch($_GET['page']){
        case 'login.php'   :
            include './auth/'.$_GET['page'];
        break;
        case 'loginU.php'   :
            include './auth/'.$_GET['page'];
        break;
        case 'logout.php'   :
            include './auth/'.$_GET['page'];
        break;
            case 'register.php':
                include './auth/'.$_GET['page'];
                break;
                case 'registerU.php':
                    include './auth/'.$_GET['page'];
                    break;
        case 'scelta.php':
            include './auth/'.$_GET['page'];
            break;        
        default:
        include './public/page/'.$_GET['page'];
        break;
    }
    
}

?>