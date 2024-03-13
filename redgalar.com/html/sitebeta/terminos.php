<?php 
  ob_start("ob_gzhandler");
  session_start();

  include("util/query.php");
  include("util/url.php");

  if(!isset($_SESSION['email'])){
    header("Location:" . $url . "logout.php");
  }
	$user_email=$_SESSION['email'];

    $sqlUsuario = "SELECT * FROM usuario WHERE user_email='$user_email'";
    $rsUsuario = mysql_query($sqlUsuario);

    $user_id = mysql_result($rsUsuario,0,"user_id");
	//obetenemos el codigo de compra
	$getCod = $_GET["cod"];
	$sql ="SELECT *,
	admin.user_name as empresa
	FROM
	pedido
	INNER JOIN admin ON pedido.id_empresa = admin.user_id
	WHERE
	pedido.id_codigo = '".$getCod."'
	GROUP BY
	pedido.id_empresa";
	$empresas = mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com | Finalizar Compra</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/jquery.bxslider.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>css/responsive-tabs.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApzy0CShzBoU83-HLZs9mJa8GbeqlpmDU"></script>
  <script src="https://checkout.culqi.com/v2"></script>
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid cabecera-breadcrumbs">
    <div class="container">
      <div class="row">
        <ol>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Registro</a></li>
          <li class="active">Finalizar Compra</li>
        </ol>
        <h2>Terminos y condiciones</h2>
      </div>
    </div>  
  </div>
  <div class="container-fluid" id="carrito">
		<div id="x" data-x="<?php echo $pe_lat; ?>"></div>
		<div id="y" data-y="<?php echo $pe_lng; ?>"></div>

		<input type="hidden" id="user_id" value="<?php echo $user_id; ?>">
		<input type="hidden" id="pro_id" value="<?php echo $pro_id; ?>">
		<input type="hidden" id="pe_id" value="<?php echo $pe_id; ?>">
		<input type="hidden" id="codigo_pedido" value="<?php echo $getCod; ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div class="row text-justify">
				<h2>Términos y condiciones</h2>
				<p style="text-align:justify">El sitio www.redgalar.com y su contenido son administrados por INNOVATIVA LATAM S.A.C. (“Redgalar”). Los siguientes Términos y Condiciones (los “Términos y Condiciones”) han sido elaborados para dirigir las acciones y reglas de la página web y la interacción entre Redgalar, las personas que se registran en la página web y las personas que se suscriben/compran y pagan (los “Usuarios”). Al ingresar, navegar o usar este sitio, usted reconoce que ha leído, entendido y está de acuerdo con estos términos. Si no está de acuerdo con los términos, no debería usar o ingresar a este sitio. Redgalar se reserva el derecho de revisar estos términos en cualquier momento y actualizar su contenido. Se le invita a revisar estos términos frecuentemente. Estar de acuerdo con estos términos constituye también su aceptación de la Política de Privacidad.</p>
				<p style="text-align:justify"><strong>1.LA EMPRESA</strong><br>El sitio redgalar.com, la marca, el logotipo y todo el contenido es propiedad de INNOVATIVA LATAM S.A.C., sociedad anónima cerrada constituida en la República del Perú, identificada con RUC N° 20601821592.</p>
				<p style="text-align:justify"><strong>2.ALCANCE DE LOS TÉRMINOS Y CONDICIONES</strong><br>Este documento describe los Términos y Condiciones y las políticas de privacidad (las "Políticas de Privacidad") aplicables al acceso y uso de los servicios ofrecidos por Redgalar (los “Servicios") dentro del sitio www.redgalar.com, sus subdominios y/u otros dominios (urls) relacionados ("redgalar.com" o el "Sitio"), en donde éstos Términos y Condiciones se encuentren. Cualquier persona que desee acceder y/o suscribirse y/o usar el Sitio o los Servicios podrá hacerlo sujetándose a los Términos y Condiciones Generales y las Políticas de Privacidad, junto con todas las demás políticas y principios que rigen resgalar.com y que son incorporados al presente directamente o por referencia o que son explicados y/o detallados en otras secciones de esta página web. En consecuencia, todas las visitas y todos los contratos y transacciones que se realicen en este Sitio, así como sus efectos jurídicos, quedarán regidos por estas reglas y sometidos a la legislación aplicable en Perú.</p>
				<p style="text-align:justify">Cualquier persona que no acepte estos Términos y Condiciones y las políticas de privacidad, los cuales tienen un carácter obligatorio y vinculante, deberá abstenerse de utilizar la página web y/o los Servicios.</p>
				<p style="text-align:justify">El Usuario debe leer, entender y aceptar todas las condiciones establecidas en los Términos y Condiciones y en las Políticas de Privacidad de Redgalar, así como en los demás documentos incorporados a los mismos por referencia, previo a su registro como Usuario de redgalar y/o a la adquisición de productos y/o entrega de cualquier dato, quedando sujetos a lo señalado y dispuesto en los Términos y Condiciones. </p>
				<p style="text-align:justify">Cuando usted visita redgalar.com se está comunicando con Redgalar de manera electrónica. En ese sentido, usted brinda su consentimiento para recibir comunicaciones de Redgalar por correo electrónico o mediante la publicación de avisos en su portal.</p>
				<p style="text-align:justify"><strong>3.CAPACIDAD LEGAL</strong><br>Los Servicios sólo están disponibles para personas que tengan capacidad legal para contratar. No podrán utilizar los servicios las personas que no tengan esa capacidad entre estos los menores de edad o Usuarios de Redgalar que hayan sido suspendidos temporalmente o inhabilitados definitivamente en razón de lo dispuesto en la sección 4 “Registro y Uso del Sitio”. Los actos que los menores realicen en este sitio serán responsabilidad de sus padres, tutores, encargados o curadores, y por tanto se considerarán realizados por éstos en ejercicio de la representación legal con la que cuentan.</p>
				<p style="text-align:justify">Quien registre un Usuario como empresa afirmará que (i) cuenta con capacidad para contratar en representación de tal entidad y de obligar a la misma en los términos de este acuerdo, (ii) la dirección señalada en el registro es el domicilio fiscal de dicha entidad, y (iii) cualquier otra información presentada a Redgalar es verdadera, precisa, actualizada, completa y oportuna.</p>
				<p style="text-align:justify"><strong>4.REGISTRO Y USO DEL SITIO</strong><br>Es obligatorio completar el formulario de registro en todos sus campos con datos válidos y verdaderos para convertirse en Usuario autorizado de redgalar.com (el "Usuario"), de esta manera, podrá acceder a las promociones, y a la adquisición de productos ofrecidos en este portal. El futuro Usuario deberá completar el formulario de registro con su información personal de manera exacta, precisa y verdadera ("Datos Personales") y asume el compromiso de actualizar los Datos Personales conforme resulte necesario. Redgalar podrá utilizar diversos medios para identificar a sus Usuarios, pero Redgalar no se responsabiliza por la certeza de los Datos Personales provistos por sus Usuarios. Los Usuarios garantizan y responden, en cualquier caso, de la exactitud, veracidad, vigencia y autenticidad de los Datos Personales ingresados. En ese sentido, la declaración realizada por los Usuarios al momento de registrarse se entenderá como una Declaración Jurada.</p>
				<p style="text-align:justify">Cada miembro sólo podrá ser titular de una (1) cuenta en Redgalar, no pudiendo acceder a más de una (1) cuenta de Redgalar con distintas direcciones de correo electrónico o falseando, modificando y/o alterando sus datos personales de cualquier manera posible. En caso se detecte esta infracción, Redgalar se comunicará con el cliente informándole que todas sus cuentas serán agrupadas en una sola cuenta anulándose todas sus demás cuentas, ello se informara al usuario mediante correo electrónico indicado por él mismo o el último registrado en Redgalar.</p>
				<p style="text-align:justify">Si se verifica o sospecha algún uso fraudulento y/o malintencionado y/o contrario a estos Términos y Condiciones y/o contrarios a la buena fe, Redgalar tendrá el derecho inapelable de dar por terminados los créditos, no hacer efectiva las promociones, cancelar las transacciones en curso, dar de baja las cuentas y hasta de perseguir judicialmente a los infractores.</p>
				<p style="text-align:justify">Redgalar podrá realizar los controles que crea convenientes para verificar la veracidad de la información dada por el Usuario. En ese sentido, se reserva el derecho de solicitar algún comprobante y/o dato adicional a efectos de corroborar los Datos Personales, así como de suspender temporal o definitivamente a aquellos Usuarios cuyos datos no hayan podido ser confirmados. En caso de suspensión temporal Redgalar comunicara al cliente informando el tiempo de suspensión de la cuenta. En casos de inhabilitación, Redgalar podrá dar de baja la compra efectuada, sin que ello genere derecho alguno a resarcimiento, pago y/o indemnización.</p>
				<p style="text-align:justify">El Usuario, una vez registrado, dispondrá de su dirección de email y una clave secreta (en adelante la "Clave") que le permitirá el acceso personalizado, confidencial y seguro. En caso de poseer estos datos, el Usuario tendrá la posibilidad de cambiar la Clave de acceso para lo cual deberá sujetarse al procedimiento establecido en el sitio respectivo. El Usuario se obliga a mantener la confidencialidad de su Clave de acceso, asumiendo totalmente la responsabilidad por el mantenimiento de la confidencialidad de su Clave secreta registrada en este sitio web, la cual le permite efectuar compras, solicitar servicios y obtener información (la “Cuenta”). Dicha Clave es de uso personal, y su entrega a terceros no involucra responsabilidad de Redgalar o de las empresas en caso de utilización indebida, negligente y/o incorrecta.</p>
				<p style="text-align:justify">El Usuario será responsable por todas las operaciones efectuadas en y desde su Cuenta, pues el acceso a la misma está restringido al ingreso y uso de una Clave secreta, de uso y conocimiento exclusivo del Usuario. EL Usuario se compromete a notificar a Redgalar en forma inmediata y por medio idóneo y fehaciente, cualquier uso indebido o no autorizado de su Cuenta y/o Clave, así como el ingreso por terceros no autorizados a la misma. Se aclara que está prohibida la venta, cesión, préstamo o transferencia de la Clave y/o Cuenta bajo ningún título.</p>
				<p style="text-align:justify">Redgalar se reserva el derecho de rechazar cualquier solicitud de registro o de cancelar un registro previamente aceptado, sin que esté obligado a comunicar o exponer las razones de su decisión y sin que ello genere algún derecho a indemnización o resarcimiento.</p>
				<p style="text-align:justify">El registro del Usuario es personal y no se puede transferir por ningún motivo a terceras personas. En ese sentido, ningún usuario podrá vender, intentar vender, ceder o transferir un usuario o contraseña. Por lo dicho, Redgalar podrá suspender o cancelar definitivamente una cuenta en el caso de una venta, ofrecimiento de venta, cesión o transferencia, en infracción de lo dispuesto en el presente párrafo.</p>
				<p style="text-align:justify"><strong>5.Modificaciones del Acuerdo</strong><br>Redgalar podrá modificar los Términos y Condiciones Generales en cualquier momento, haciendo públicos en el Sitio los términos modificados. Todos los términos modificados entrarán en vigencia a los 10 (diez) días hábiles después de su publicación. Dentro de los 5 (cinco) días hábiles siguientes a la publicación de las modificaciones introducidas, el Usuario se deberá comunicar por e-mail a la siguiente dirección[●]@redgalar.com si no acepta las mismas; en ese caso quedará disuelto el vínculo contractual y será inhabilitado como Miembro. Vencido este plazo, se considerará que el Usuario acepta los nuevos términos y el contrato continuará vinculando a ambas partes.</p>
				<p style="text-align:justify"><strong>6.Medios de Pago que se Podrán Utilizar en el Sitio</strong><br>Los productos y servicios ofrecidos en el Sitio, salvo que se señale una forma diferente para casos particulares u ofertas de determinados bienes o servicios, sólo pueden ser pagados con los medios que en cada caso específicamente se indiquen. El uso de tarjetas de créditos o Debito se sujetará a lo establecido en estos Términos y Condiciones y, en relación con el  emisor de las tarjetas, y a lo pactado en sus respectivos contratos y/o reglamentos. Tratándose de tarjetas bancarias aceptadas en el Sitio, los aspectos relativos a éstas, tales como la fecha de emisión, caducidad, cupo, bloqueos, cobros de comisiones, interés de compra en cuotas etc., se regirán por el respectivo contrato y reglamento que se tenga con la entidad bancaria otorgante de la respectiva tarjeta, de tal forma que Redgalar no tendrá responsabilidad por cualquiera de los aspectos señalados. Redgalar podrá indicar determinadas condiciones de compra según el medio de pago que se utilice por el usuario. Redgalar podrá otorgar descuento en la forma de créditos que los Usuarios podrán descontar en su compra. En cada caso Redgalar determinará unilateralmente el monto máximo de créditos que el Usuario podrá utilizar en una compra y lo detallará en el sistema, previo a iniciar el proceso de pago. Los créditos utilizados por los Usuarios no serán reintegrados en caso de devolución de los productos o cancelación de las órdenes de compra, por cualquier causa que esto ocurriera.</p>
				<p style="text-align:justify">Al utilizar una tarjeta de crédito o débito, el nombre del titular de dicha tarjeta debe coincidir con el nombre utilizado al registrarse en el portal de Redgalar. De lo contrario, se podría anular la operación. Bajo cualquier sospecha y/o confirmación de compras no autorizadas, Redgalar cancelará la compra y efectuará el reverso a la tarjeta de forma automática.</p>
				<p style="text-align:justify"><strong>7.Formación del Consentimiento en los Contratos Celebrados a Través de este Sitio</strong><br>A través del Sitio web las empresas realizarán ofertas de bienes y servicios, que podrán ser aceptadas a través de la aceptación, por vía electrónica, y utilizando los mecanismos que el mismo sitio web de Redgalar ofrece para ello. Toda aceptación de oferta quedará sujeta a la condición suspensiva de que se valide la transacción. En consecuencia, para toda operación que se efectúe en este sitio, la confirmación y/o validación o verificación por parte de Redgalar , será requisito para la formación del consentimiento. Para validar la transacción la empresa deberá verificar: a) Que exista stock disponible de los productos al momento en que se acepta la oferta, b) Que valida y acepta el medio de pago ofrecido por el usuario, c) Que los datos registrados por el cliente en el sitio coinciden con los proporcionados al efectuar su aceptación de oferta, d) Que el pago es acreditado por el Usuario.</p>
				<p style="text-align:justify">Para informar al Usuario o consumidor acerca de esta validación, el sitio deberá enviar una confirmación escrita a la misma dirección electrónica que haya registrado el Usuario aceptante de la oferta, o por cualquier medio de comunicación que garantice el debido y oportuno conocimiento del consumidor, o mediante el envío efectivo del producto. El consentimiento se entenderá formado desde el momento en que se envía esta confirmación escrita al Usuario y en el lugar en que fue expedida. La oferta efectuada a el Usuario es irrevocable salvo en circunstancias excepcionales, tales como que Redgalar cambie sustancialmente la descripción del artículo después de realizada alguna oferta, o que exista un claro error tipográfico.</p>
				<p style="text-align:justify">Aviso Legal: La venta y despacho de los productos está condicionada a su disponibilidad, y a las existencias de producto y/o a un claro error tipográfico. Cuando el producto no se encuentre disponible y/o haya tenido un error tipográfico, Redgalar notificará de inmediato al cliente y devolverá el valor total del precio pagado.</p>
				<p style="text-align:justify"><strong>8.Despacho de los Productos</strong><br>Los productos adquiridos a través de la página web de Redgalar se sujetarán a las condiciones de despacho y entrega elegidas por el cliente y disponibles en esta web.</p>
				<p style="text-align:justify">
					<ul>
						<li>La información del lugar de envío es de exclusiva responsabilidad del cliente. Por lo que será de su entera responsabilidad la exactitud de los datos indicados para realizar una correcta y oportuna entrega de los productos a su domicilio o dirección de envío. Si hubiera algún error en la dirección, no producto podría no llegar en la fecha y hora indicada.</li>
						<li>Los plazos elegidos para el despacho y entrega, se cuentan desde que Redgalar valida la orden de compra y el medio de pago utilizado, considerándose días hábiles para el cumplimiento de dicho plazo.</li>
						<li>Redgalar mantendrá informado a los clientes sobre el estado de su pedido.</li>
						<li>El Usuario sólo podrá solicitar el cambio de dirección antes de recibir el correo de confirmación de Redgalar, si en caso el Usuario no ha ingresado la dirección correcta en el momento de realizar la compra y la orden ya se encuentre confirmada, el cliente tendría que solicitar a Redgalar la cancelación de la compra inicial y crear una nueva con la dirección correcta, teniendo en cuenta que la venta y despacho de los productos está condicionada a su disponibilidad, nuevo precio del producto, los nuevos  plazos de entrega, establecidos por Redgalar y los costos asociados a esta nueva dirección.
		Nota: Se recomienda al Usuario realizar el cambio de la dirección en su cuenta de Redgalar para que en próximas compras no se genere error alguno.</li>
						<li>Redgalar realizará hasta dos intentos de visita al domicilio indicado por el cliente.</li>
						<li>El siguiente día útil de efectuada la primera visita, el transportista realizará un último intento de entrega del pedido. Si en esta segunda entrega, se vuelve a encontrar ausente al destinatario del envío, el pedido será retornado al Proveedor / Distribuidor, para que el producto sea entregado directamente por éste.</li>
						<li>Posteriormente le llegará un correo electrónico al Usuario sobre el lugar de entrega de su producto. </li>
						<li>Redgalar cuenta con cobertura de despachos a nivel de Lima Metropolitana, sin embargo, hay destinos de difícil acceso en los cuales no podrá efectuar despachos y esto será identificado por el Uliente al momento de realizar su compra (aparecerá cuando el cliente selecciona DEPARTAMENTO/PROVINCIA/DISTRITO). En caso la ubicación del domicilio del cliente no pueda atenderse porque está en una calle o zona de difícil acceso, Redgalar se comunicará con el cliente para gestionar un cambio de domicilio y poder entregar el producto adquirido.</li>
						<li>Cuando el cliente recibe un producto que no es de grandes dimensiones, deberá validar que la caja o bolsa que contenga el producto, esté sellado y no tenga signos de apertura previa; en caso detecte esto, no deberá recibir el producto y deberá ponerse en contacto inmediatamente con Redgalar. En caso que el producto fuera recibido en buenas condiciones y completo, el cliente firmará la guía de pedido, dejando así conformidad de la entrega. Luego de la aceptación del producto y firma documentaria, el cliente no podrá presentar reclamo por daño del producto.</li>
						<li>El transportista encargado de la entrega del producto no está facultado ni autorizado de realizar maniobras especiales, llámese desmontaje de puertas ni ventanas, ingreso del producto con poleas, sogas, tampoco ingresará el producto por balcones, ventanas, tragaluz, ni sogas.</li>
						<li>El Transportista del producto no realiza ni instalaciones ni armados de productos, para el caso de entrega de productos.</li>
					</ul>
				</p>
				<p style="text-align:justify"><strong>9.Política de Garantías</strong><br>En caso que un producto adquirido a través de la web de Redgalar presente problemas de funcionamiento o daños el cliente podrá contactar a Redgalar quien proporcionará los datos del vendedor o proveedor para que éste le brinde un soporte adecuado a su solicitud de garantía.</p>
				<p style="text-align:justify">La garantía del proveedor o la marca inicia después de haberse cumplido los [●] días calendarios desde la entrega del producto.</p>
				<p style="text-align:justify"><strong>10.Comprobantes de Pago</strong><br>Según el reglamento de Comprobantes de Pago aprobado por la Resolución de Superintendencia N° 007-99 / SUNAT (RCP) y el Texto Único Ordenado de la Ley del Impuesto General a las Ventas e Impuesto Selectivo al Consumo, aprobado mediante Decreto Supremo N° 055-99-EF y normas modificatorias (TUO del IGV): “No existe ningún procedimiento vigente que permita el canje de boletas de venta por facturas, más aún las notas de crédito no se encuentran previstas para modificar al adquirente o usuario que figura en el comprobante de pago original”.</p>
				<p style="text-align:justify">Teniendo en cuenta esta resolución, es obligación del consumidor decidir correctamente el documento que solicitará como comprobante al momento de su compra, ya que según los párrafos citados no procederá cambio alguno.</p>
				<p style="text-align:justify"><strong>11.Reembolsos</strong><br>Luego que el reembolso es aprobado y ejecutado, el tiempo de procesamiento varía según el método de pago usado. Para una compra con tarjeta de crédito, débito o métodos que permitan la devolución del dinero a través de una cuenta asociada, se hará el reverso a la tarjeta o a la cuenta asociada por el total pagado.</p>
				<p style="text-align:justify">Para una compra a través de una transferencia, depósito bancario o pagos en efectivo, se hará una transferencia por el total pagado a cuenta bancaria del titular de la compra.</p>
				<p style="text-align:justify">Tiempos de ejecución: El tiempo de ejecución del reembolso es de hasta un (1) día hábil.</p>
				<p style="text-align:justify">Tiempos de procesamiento: Reverso a la tarjeta: El tiempo del reembolso a una tarjeta puede ser hasta quince (15) días hábiles, el tiempo de procesamiento es responsabilidad de la entidad financiera que emitió la tarjeta y es contado desde la ejecución del reembolso.</p>
				<p style="text-align:justify">Transferencia bancaria: Para recibir el dinero en una cuenta bancaria, el titular de la cuenta debe ser el mismo que realizó la compra en Redgalar. El tiempo de procesamiento es de tres (3) días hábiles desde su ejecución. La información bancaria proporcionada por el cliente debe ser correcta para evitar retrasos en la atención. De no ser así los tiempos de ejecución y procesamiento se prolongarán.</p>
				<p style="text-align:justify">Los datos necesarios son:</p>
				<p style="text-align:justify">
					<ul>
						<li>Nombre y apellido</li>
						<li>Documento de Identidad</li>
						<li>Número de orden</li>
						<li>Correo electrónico registrado en Redgalar</li>
						<li>Datos de la cuenta bancaria</li>
					</ul>
				</p>
				<p style="text-align:justify">Cabe precisar que Redgalar no se responsabiliza por las demoras o dificultades que presente la respectiva entidad financiera para el cumplimiento del reembolso.</p>
				<p style="text-align:justify"><strong>12.Propiedad Intelectual</strong><br>Todo el contenido incluido o puesto a disposición del Usuario en el Sitio, incluyendo textos, gráficas, logos, íconos, imágenes, archivos de audio, descargas digitales y cualquier otra información (el "Contenido"), es de propiedad de INNOVATIVA LATAM S.A.C. o ha sido licenciada a ésta por las Empresas Proveedoras. La compilación del Contenido es propiedad exclusiva de INNOVATIVA LATAM S.A.C. y, en tal sentido, el Usuario debe abstenerse de extraer y/o reutilizar partes del Contenido sin el consentimiento previo y expreso de la Empresa.</p>
				<p style="text-align:justify">Además del Contenido, las marcas, denominativas o figurativas, marcas de servicio, diseños industriales y cualquier otro elemento de propiedad intelectual que haga parte del Contenido (la "Propiedad Industrial"), son de propiedad de INNOVATIVA LATAM S.A.C. o de las Empresas Proveedoras y, por tal razón, están protegidas por las leyes y los tratados internacionales de derecho de autor, marcas, patentes, modelos y diseños industriales. El uso indebido y la reproducción total o parcial de dichos contenidos quedan prohibidos, salvo autorización expresa y por escrito de INNOVATIVA LATAM S.A.C., asimismo, no pueden ser usadas por los Usuarios en conexión con cualquier producto o servicio que no sea provisto por INNOVATIVA LATAM S.A.C. En el mismo sentido, la Propiedad Industrial no podrá ser usada por los Usuarios en conexión con cualquier producto y servicio que no sea de aquellos que comercializa u ofrece INNOVATIVA LATAM S.A.C. o de forma que produzca confusión con sus clientes o que desacredite a la Empresa o a las Empresas Proveedoras.</p>
				<p style="text-align:justify"><strong>13.Responsabilidad de Redgalar</strong><br>Redgalar hará lo posible dentro de sus capacidades para que la transmisión del sitio web sea ininterrumpida y libre de errores. Sin embargo, dada la naturaleza de la Internet, dichas condiciones no pueden ser garantizadas. En el mismo sentido, el acceso del Usuario a la Cuenta puede ser ocasionalmente restringido o suspendido con el objeto de efectuar reparaciones, mantenimiento o introducir nuevos servicios. Redgalar no será responsable por pérdidas (i) que no hayan sido causadas por el incumplimiento de sus obligaciones; (ii) lucro cesante o pérdidas de oportunidades comerciales; (iii) cualquier daño indirecto.</p>
				<p style="text-align:justify"><strong>14.Indemnización</strong><br>El Usuario indemnizará y mantendrá indemne a Redgalar, sus filiales, empresas controladas y/o controlantes, directivos, administradores, representantes y empleados, por su incumplimiento en los Términos y Condiciones Generales y demás Políticas que se entienden incorporadas al presente o por la violación de cualesquiera leyes o derechos de terceros, incluyendo los honorarios de abogados en una cantidad razonable.</p>
				<p style="text-align:justify"><strong>15.Términos de Ley</strong><br>Este acuerdo será gobernado e interpretado de acuerdo con las leyes de Perú, sin dar efecto a cualquier principio de conflictos de ley. Si alguna disposición de estos Términos y Condiciones es declarada ilegal, o presenta un vacío, o por cualquier razón resulta inaplicable, la misma deberá ser interpretada dentro del marco del mismo y en cualquier caso no afectará la validez y la aplicabilidad de las provisiones restantes.</p>
				<p style="text-align:justify"><strong>16.Notificaciones</strong><br>Cualquier comentario, inquietud o reclamación respecto de los anteriores Términos y Condiciones, la Política de Privacidad, o la ejecución de cualquiera de éstos, deberá ser notificada por escrito a Redgalar a la siguiente dirección</p>
				<p style="text-align:justify"><strong>17.Jurisdicción y Ley Aplicable</strong><br>Este acuerdo estará regido en todos sus puntos por las leyes vigentes en la República del Perú.</p>
				<p style="text-align:justify">Cualquier controversia derivada del presente acuerdo, su existencia, validez, interpretación, alcance o cumplimiento, será sometida a los tribunales competentes de la ciudad de Lima, Perú.</p>
				<p style="text-align:justify"><strong>18.Política de Tratamiento de Datos Personales</strong><br>Gracias por acceder a la página web www.redgalar.com (el "Sitio") operada por INNOVATIVA LATAM S.A.C.  Nosotros respetamos su privacidad y su información personal. La presente política forma parte de uso del sitio web.</p>
				<p style="text-align:justify">Nuestra Política de Privacidad explica cómo recolectamos, utilizamos y (bajo ciertas condiciones) divulgamos su información personal. Esta Política de Privacidad también explica las medidas que hemos tomado para asegurar su información personal. Por último, esta política de privacidad explica los procedimientos que seguimos frente a la recopilación, uso y divulgación de su información personal.</p>
				<p style="text-align:justify">La protección de datos es una cuestión de confianza y privacidad, por ello es importante para nosotros. Por lo tanto, utilizaremos solamente su nombre y la información referente a usted bajo los términos previstos en nuestra Política de Privacidad.</p>
				<p style="text-align:justify">Sólo mantendremos su información durante el tiempo que nos sea requerido por la ley o debido a la relevancia de los propios fines para los que fueron recopilados.</p>
				<p style="text-align:justify">Ud. puede visitar el sitio y navegar sin tener que proporcionar datos personales. Durante su visita al sitio, Ud. permanecerá anónimo y en ningún momento podremos identificarlo, a menos que usted tenga una cuenta en el sitio e inicie sesión con su nombre de usuario y contraseña.</p>
				<p style="text-align:justify"><strong>18.1	Definiciones</strong><br>Para efectos de la presente política, las palabras que a continuación se definen tendrán el significado asignado en este capítulo, sea que se escriban o no en mayúsculas, o que se encuentren en plural o singular.</p>
				<p style="text-align:justify">
					<ul>
						<li>Autorización: Consentimiento previo, expreso e informado del titular para llevar a cabo el Tratamiento de Datos Personales.</li>
						<li>Aviso de Privacidad: Documento físico, electrónico o en cualquier otro formato, generado por el Responsable del Tratamiento, que es puesto a disposición del Titular para el Tratamiento de sus Datos Personales, el cual comunica al Titular la información relativa a la existencia de las políticas de tratamiento de información que le serán aplicables, la forma de acceder a las mismas y las características del Tratamiento que se pretende dar a los datos personales.</li>
						<li>Redgalar o Responsable: INNOVATIVA LATAM S.A.C.</li>
						<li>Dato Personal: Cualquier información vinculada o que pueda asociarse a una o varias personas naturales determinadas o determinables.</li>
						<li>Datos Sensibles: Se entiende por datos sensibles aquellos que afectan la intimidad del Titular o cuyo uso indebido puede generar su discriminación, tales como aquellos que revelen el origen racial o étnico, la orientación política, las convicciones religiosas o filosóficas, la pertenencia a sindicatos, organizaciones sociales, de derechos humanos o que promueva intereses de cualquier partido político o que garanticen los derechos y garantías de partidos políticos de oposición así como los datos relativos a la salud, a la vida sexual y los datos biométricos, entre otros.</li>
						<li>Encargado del Tratamiento: Persona natural o jurídica, pública o privada, que por sí misma o en asocio con otros, realice el Tratamiento de Datos Personales por cuenta del Responsable del Tratamiento de Datos Personales.</li>
						<li>Responsable del Tratamiento: Persona natural o jurídica, pública o privada, que por sí misma o en asocio con otros, decida sobre la base de datos y/o el Tratamiento de los datos.</li>
						<li>Titular: Persona natural cuyos datos personales sean objeto de Tratamiento.</li>
						<li>Tratamiento de Datos Personales: Cualquier operación o conjunto de operaciones sobre Datos Personales, tales como la recolección, almacenamiento, uso, circulación o supresión.</li>
					</ul>
				</p>
				<p style="text-align:justify"><strong>18.2	NORMAS Y CRITERIOS DE APLICACIÓN</strong><br>Principios Generales para el Tratamiento de Datos Personales, En el Tratamiento de Datos Personales se cumplirá con los siguientes principios (LEY Nº 29733):</p>
				<p style="text-align:justify">
					<ul>
						<li>Principio de finalidad: El Tratamiento de Datos Personales debe obedecer a una finalidad legítima que se informará al Titular.</li>
						<li>Principio de libertad: El Tratamiento de Datos Personales sólo puede ejercerse con el consentimiento, previo, expreso e informado del Titular. Los Datos Personales no podrán ser obtenidos o divulgados sin previa autorización, o en ausencia de mandato legal o judicial que releve el consentimiento del Titular.</li>
						<li>Principio de veracidad o calidad: La información sujeta a tratamiento debe ser veraz, completa, exacta, actualizada, comprobable y comprensible. Se prohíbe el Tratamiento de datos parciales, incompletos, fraccionados o que induzcan a error.</li>
						<li>Principio de transparencia: En el Tratamiento debe garantizarse el derecho del Titular a obtener de Redgalar, en cualquier momento y sin restricciones, información acerca de la existencia de datos que le conciernan.</li>
						<li>Principio de acceso y circulación restringida: Los Datos Personales, salvo la información pública, no podrán estar disponibles en Internet u otros medios de divulgación o comunicación masiva, salvo que el acceso sea técnicamente controlable para brindar un conocimiento restringido sólo a los Titulares o terceros autorizados por aquél.</li>
						<li>Principio de seguridad: La información sujeta a Tratamiento, se deberá manejar con las medidas técnicas, humanas y administrativas que sean necesarias para otorgar seguridad a los registros evitando su adulteración, pérdida, consulta, uso o acceso no autorizado o fraudulento.</li>
						<li>Principio de confidencialidad: Todas las personas que intervengan en el Tratamiento de Datos Personales están obligadas a garantizar la reserva de la información, inclusive después de finalizada su relación con alguna de las labores que comprende el tratamiento.</li>
					</ul>
				</p>
				<p style="text-align:justify"><strong>18.3	2. Tratamiento al cual serán Sometidos los Datos y Finalidad del mismo</strong><br>TERCEROS Y ENLACES:</p>
				<p style="text-align:justify">Redgalar podrá transferir y/o transmitir los datos personales sujetos a tratamiento a compañías que hagan parte de su grupo empresarial, esto es, a compañías matrices, filiales o subsidiarias. También podemos proporcionar su información a nuestros agentes y subcontratistas para que nos ayuden con cualquiera de las funciones mencionadas en nuestra Política de Privacidad. Por ejemplo, podemos utilizar a terceros para que nos ayuden con la entrega de promoción de productos, recaudar sus pagos, enviar productos o tercerizar nuestros sistemas de servicio al cliente. Podemos intercambiar información con terceros a efectos de protección contra el fraude y la reducción de riesgo de crédito. Podemos transferir nuestras bases de datos que contienen su información personal si vendemos nuestro negocio o parte de este. Al margen de lo establecido en la presente Política de Privacidad, no podremos vender o divulgar sus datos personales a terceros sin obtener su consentimiento previo, a menos que sea necesario para los fines establecidos en esta Política de Privacidad o estemos obligados a hacerlo por ley. El Sitio puede contener publicidad de terceros y enlaces a otros sitios o marcos de otros sitios. Tenga en cuenta que no somos responsables de las prácticas de privacidad o contenido de dichos terceros u otros sitios, ni por cualquier tercero a quien se transfieran sus datos de acuerdo con nuestra Política de Privacidad.</p>
				<p style="text-align:justify">Teniendo en cuenta lo anterior los datos Personales serán utilizados por Redgalar para: Proveer servicios y productos requeridos. Informar sobre nuevos productos o servicios que estén relacionados o no, con el contratado o adquirido por el Titular.</p>
				<p style="text-align:justify">
					<ul>
						<li>Dar cumplimiento a obligaciones contraídas con el Titular.</li>
						<li>Informar sobre cambios en productos o servicios.</li>
						<li>Evaluar la calidad de productos o servicios.</li>
						<li>Desarrollar actividades de mercadeo o promocionales.</li>
						<li>Enviar al correo físico, electrónico, celular o dispositivo móvil, - vía mensajes de texto (SMS y/o MMS) información comercial, publicitaria o promocional sobre los productos y/o servicios, eventos y/o promociones de tipo comercial o no de estas, con el fin de impulsar, invitar, dirigir, ejecutar, informar y de manera general, llevar a cabo campañas, promociones o concursos de carácter comercial o publicitario.</li>
						<li>Compartir, incluyendo la transferencia y transmisión de datos personales a terceros para fines relacionados con la operación de Redgalar.</li>
						<li>Realizar estudios internos sobre el cumplimiento de las relaciones comerciales y estudios de mercado a todo nivel.</li>
						<li>Responder requerimientos legales de entidades administrativas y judiciales.</li>
					</ul>
				</p>
				<p style="text-align:justify"><strong>18.4	Autorizaciones</strong><br>El Tratamiento de Datos Personales realizados por Redgalar, requiere del consentimiento libre, previo, expreso e informado del Titular de dichos datos. Redgalar, en su condición de Responsable del Tratamiento de Datos Personales, ha dispuesto de los mecanismos necesarios para obtener la autorización de los titulares garantizando en todo caso que sea posible verificar el otorgamiento de dicha autorización.</p>
				<p style="text-align:justify">La autorización podrá darse verbalmente y/o por medio de un documento físico, electrónico o cualquier otro formato que permita garantizar su posterior consulta. En cualquier caso la autorización debe ser dada por el Titular y en ésta se debe poder verificar que éste conoce y acepta que Redgalar recogerá y utilizará la información para los fines que para el efecto se le dé a conocer de manera previa al otorgamiento de la autorización.</p>
				<p style="text-align:justify">En virtud de lo anterior, la autorización solicitada deberá incluir:</p>
				<p style="text-align:justify">
					<ul>
						<li>Responsable del Tratamiento y qué datos se recopilan</li>
						<li>La finalidad del tratamiento de los datos</li>
						<li>Los derechos de acceso, corrección, actualización o supresión de los datos personales suministrados por el titular</li>
						<li>Si se recopilan Datos Sensibles</li>
						<li>Adicionalmente se le informará al Titular (i) que no se encuentra obligado a autorizar el tratamiento, y (ii) que es facultativo entregar este tipo de información.</li>
					</ul>
				</p>
				<p style="text-align:justify"><strong>18.5	Procedimiento para el Ejercicio de los Derechos de Conocer, Actualizar, Rectificar, Suprimir Información y Revocar la Autorización</strong><br>Los Titulares de los Datos Personales podrán en cualquier momento solicitarle al Responsable del Tratamiento qué información de ellos se conserva, así como solicitar la actualización ratificación o supresión de dicha información, usando los medios descritos en el numeral 7 de la presente política. Adicionalmente podrán revocar la autorización otorgada.</p>
				<p style="text-align:justify">La solicitud de supresión de la información y la revocatoria de la autorización no procederán cuando el Titular tenga un deber legal, contractual o comercial de permanecer en la base de datos.</p>
				<p style="text-align:justify">Con dicho fin, el Titular de la información a través de los diferentes medios predeterminados por Redgalar en el numeral 7) realizará el reclamo indicando su número de identificación, los datos de contacto y aportando la documentación pertinente que pretenda hacer valer. Si Redgalar estima que para el análisis de la solicitud requiere mayor información de parte del Titular, procederá a comunicar tal situación dentro de los siete (7) días hábiles siguientes de recibida la solicitud. Transcurridos diez (10) días hábiles desde la fecha del requerimiento, sin que el solicitante presente la información requerida, se tendrá por no presentado el reclamo.</p>
				<p style="text-align:justify">El término máximo para atender el reclamo será de diez (10) quince (15) días hábiles contados a partir del día siguiente a la fecha de su recibo. Cuando no fuere posible atenderlo dentro de dicho término se informará al interesado antes del vencimiento del referido plazo los motivos de la demora y la fecha en que se atenderá su reclamo, la cual en ningún caso podrá superar los diez (10) días hábiles siguientes al vencimiento del primer término.</p>
				<p style="text-align:justify"><strong>18.6	Derechos y Deberes de los Titulares</strong><br>El Titular de los Datos Personales tendrá los siguientes derechos:</p>
				<p style="text-align:justify">Conocer, actualizar y rectificar los Datos Personales.</p>
				<p style="text-align:justify">Solicitar pruebas de la autorización otorgada a Redgalar.</p>
				<p style="text-align:justify">Ser informado por Redgalar, previa solicitud, respecto del uso que le ha dado a sus Datos Personales.</p>
				<p style="text-align:justify">Presentar consultas ante el Responsable o Encargado del Tratamiento, conforme a lo establecido en el numeral 3 de la presente política, e interponer quejas ante el Tribunal Constitucional.</p>
				<p style="text-align:justify">Acceder de manera gratuita a los Datos Personales que son objeto de Tratamiento en los términos de la Ley y Reglamento de Protección de Datos Personales.</p>
				<p style="text-align:justify">El Titular de los Datos Personales tendrá el deber de mantener actualizada su información y garantizar, en todo momento, la veracidad de la misma. Redgalar no se hará responsable, en ningún caso, por cualquier tipo de responsabilidad derivada por la inexactitud de la información.</p>
				<p style="text-align:justify"><strong>18.7	Medidas de Seguridad</strong><br>Redgalar adoptará las medidas técnicas, humanas y administrativas que sean necesarias para otorgar seguridad a los registros evitando su adulteración, pérdida, consulta, uso o acceso no autorizado o fraudulento. Dichas medidas responderán a los requerimientos mínimos hechos por la legislación vigente y periódicamente se evaluará su efectividad.</p>
				<p style="text-align:justify"><strong>18.8	Responsable y Contacto</strong><br>Redgalar estará encargada de la recolección y el Tratamiento de Datos Personales, la Autorización y los registros almacenados, en todos los casos, impidiendo que se deterioren, pierdan, alteren o se usen sin autorización y conservarlos con la debida seguridad.</p>
				<p style="text-align:justify">El área de servicio al cliente estará a cargo de atender las peticiones, quejas y consultas de los titulares de los datos y los Titulares de la Información pueden ejercer sus derechos de conocer, actualizar, rectificar y suprimir sus Datos Personales, enviando comunicaciones a [indicar dirección], al correo electrónico [●]@redgalar.com o al teléfono [●].</p>
				<p style="text-align:justify"><strong>18.9	Entrada en Vigencia, Modificación y Periodo de Vigencia de las Bases de Datos</strong><br>La información suministrada por los grupos de interés permanecerá almacenada hasta por el término de cinco (5) años contados a partir de la fecha del último Tratamiento, para permitirnos el cumplimiento de las obligaciones legales y/o contractuales a su cargo especialmente en materia contable, fiscal y tributaria.</p>
				<p style="text-align:justify">Esta política podrá ser modificada en cualquier momento y de forma unilateral por parte de Redgalar, siempre teniendo en consideración la protección de datos personales de nuestros usuarios y de conformidad con la legislación aplicable.</p>
				<p style="text-align:justify"><strong>18.10 Autoridad</strong><br>Si el usuario/cliente considera que han sido vulnerados sus derechos respecto de la protección de datos personales, tiene el derecho de acudir a la autoridad correspondiente para defender su ejercicio. La autoridad es la Autoridad Nacional de Protección de Datos Personales (APDP) solicitando la tutela de sus derechos, su sitio web es <a href="http://www.minjus.gob.pe/proteccion-de-datos-personales/" target="_blank">http://www.minjus.gob.pe/proteccion-de-datos-personales/.</a></p>
			  </div>
        </div>
      </div>
	</div>
  </div>
  <?php  include "footer.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".header-chat").click(function(){
		$(".box-mensaje-red").toggle();
	});
});
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<!-- <script src="https://localhost/redgalar/js/jquery.responsiveTabs.js"></script>
<script>
  $(document).ready(function ($) {
    $('#responsiveTabsDemo').responsiveTabs({
      startCollapsed: 'accordion'
    });
  });
</script>-->

  <script>
  	 $('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		arrows: false,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});
  </script>

	<script type="text/javascript">
	$(document).ready(function(){
		//nos desplazamos entre todos los divs
		$('a.ancla').click(function(e){
		e.preventDefault();
		enlace  = $(this).attr('href');
		$('html, body').animate({
			scrollTop: $(enlace).offset().top
		}, 900);
		});
	});
	</script>

</body>
</html>