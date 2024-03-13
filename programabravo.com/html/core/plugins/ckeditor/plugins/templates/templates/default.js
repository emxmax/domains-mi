/**
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.addTemplates('default',{imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath('templates')+'templates/images/'),templates:[
{title:'Image and Title',image:'template1.gif',description:'One main image with a title and text that surround the image.',
	html:'<h3><img style="margin-right: 10px" height="100" width="100" align="left"/>Type the title here</h3><p>Type the text here</p>'},
{title:'Tabla Producto',image:'tablaprod.gif',description:'Tabla de productos, tasas y tarifas.',
	html:'<table cellpadding="0" cellspacing="0" width="99%" class="classTabla"><tbody><tr><th align="left">Tipo de Comunicación</th><th align="left">Afiliación</th><th align="left">Mantenimiento</th><th align="left">Portes</th></tr><tr><td><strong>Línea Abierta ó Internet</strong></td><td>S/.60.00 ó US$ 20.00</td><td>S/.60.00 ó US$ 20.00</td><td>S/.60.00 ó US$ 20.00</td></tr><tr><td><strong>Línea Popular Control</strong></td>             	<td>S/.18.00 Â&nbsp;ó US$ 6.00</td><td>S/. 18.00 + S/. 0.15 por transac. ó<br>US$ 6.00 + US$ 0.05 por transac.</td><td>S/.18.00 Â&nbsp;ó US$ 6.00</td></tr><tr><td><strong>Línea Popular Control</strong></td>               	<td>S/. 5.00 ó USD 1.5</td><td>S/. 5.00 ó USD 1.5</td><td>S/. 5.00 ó USD 1.5</td></tr></tbody></table><p class="txt11">NOTA: Cobro se realiza en la moneda en la que el comercio se afilie para realizar sus ventas y no incluyen IGV.</p></tbody></table>'},
{title:'Texto Lateral FAQ',image:'textolateral.gif',description:'Texto lateral de la sección Preguntas Frecuentes.',
	html:'<h3>¿Aún tienes más consultas?</h3><p><a class="azul" href="#">Contáctenos y nosotros le ayudaremos.</a></p>'},
{title:'Texto Lateral Login',image:'textologin.gif',description:'Texto lateral de la sección Login.',
	html:'<h3>¿Olvidó su clave?</h3><p class="txt14">Solicite su clave <a class="azul" href="#" target="_blank">aquí</a>.</p>'}
]});
