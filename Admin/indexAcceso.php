<?
$galleta = explode('_',encripta( 'decrypt', $_SESSION[ $huella . '_acceso' ] ));
$idU = $galleta[ 0 ] ;
$selas = "SELECT * FROM usuarios WHERE id='$idU'";
$res = $mysqli->query( $selas );
$res->data_seek( 0 );
while ( $row = $res->fetch_assoc() ) {
  die( '<script>top.location.href = "' . $url . '/_admin/";</script>' );
}
?>