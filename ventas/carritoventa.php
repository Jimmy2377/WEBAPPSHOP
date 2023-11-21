<?php
    session_start();
    $mensaje="";
    if(isset($_POST['btnAccion'])){

        switch($_POST['btnAccion']){
            case 'Agregar':
                if(is_numeric( openssl_decrypt($_POST['idpro'],COD,KEY))){
                    $ID= openssl_decrypt($_POST['idpro'],COD,KEY);
                    $mensaje.="Ok ID correcto".$ID."<br/>";
                }else{
                     $mensaje.="Upsss... ID incorreo".$ID."<br/>";
                    }

                if(is_string( openssl_decrypt($_POST['nombre'],COD,KEY))){
                    $NOMBRE= openssl_decrypt($_POST['nombre'],COD,KEY);
                    $mensaje.="Ok Nombre".$NOMBRE."<br/>";
                }else{ $mensaje.="Upsss... algo pasa con nombre"."<br/>"; break;}

                if(is_numeric( openssl_decrypt($_POST['precio'],COD,KEY))){
                    $PRECIO= openssl_decrypt($_POST['precio'],COD,KEY);
                    $mensaje.="Ok Precio".$PRECIO."<br/>";
                }else{ $mensaje.="Upsss... algo pasa con precio"."<br/>"; break;}

                if(is_numeric( openssl_decrypt($_POST['preciomay'],COD,KEY))){
                    $PRECIOMAY= openssl_decrypt($_POST['preciomay'],COD,KEY);
                    $mensaje.="Ok Preciomay".$PRECIOMAY."<br/>";
                }else{ $mensaje.="Upsss... algo pasa con preciomay"."<br/>"; break;}

                if(is_numeric( openssl_decrypt($_POST['idvendedor'],COD,KEY))){
                    $IDVENDEDOR= openssl_decrypt($_POST['idvendedor'],COD,KEY);
                    $mensaje.="Ok VENDEDOR".$IDVENDEDOR."<br/>";
                }else{ $mensaje.="Upsss... algo pasa con VENDEDOR"."<br/>"; break;}
                
                $CANTIDAD= $_POST['cantidad'];

            if(!isset($_SESSION['CARRITO'])){

                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'PRECIOMAY'=>$PRECIOMAY,
                    'CANTIDAD'=>$CANTIDAD,
                    'IDVENDEDOR'=>$IDVENDEDOR
                    
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje="Producto Agregado al carrito";
            }else{
                $idProductos=array_column($_SESSION['CARRITO'],"ID");//reunir todos los id de carrito
                if(in_array($ID,$idProductos)){//verificar que no se repita producto
                    echo "<script>alert('El producto ya ha sido seleccionado...')</script>";
                    $mensaje="";
                }else{
                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'PRECIOMAY'=>$PRECIOMAY,
                    'CANTIDAD'=>$CANTIDAD,
                    'IDVENDEDOR'=>$IDVENDEDOR
                );
                $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                $mensaje="Producto Agregado al carrito";
                }
            }
            //$mensaje= print_r($_SESSION,true); para ver los datos desencriptados que se van a enviar
            break;

            case "Eliminar":
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['ID']==$ID){
                            unset($_SESSION['CARRITO'][$indice]);
                            echo "<script>alert('Elemento borrado...')</script>";
                        }
                    }

                }else{
                    $mensaje.="Upss.. ID incorrecto".$ID."<br/>";
                }
            break;     
        }
    }
?>