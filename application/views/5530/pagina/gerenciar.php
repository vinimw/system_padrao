<div class="enquadraAlinhascroll">
			<div class="col-first">
				<h1><?php echo $TITULOINTERNO; ?></h1>
				<h5><?php echo $SUBTITULO; ?></h5>
			</div>

			<div class="alinhaCem">
				<div class="col-one">
					
					
					<table cellpadding="0" cellspacing="0" border="0" class="table-list" id="example" width="100%">
		<thead>
			<tr>
				<th align="center" width="5%">&nbsp;</th>
				<th align="left" width="30%">Página</th>
				<th class="no-mobile" align="center" width="35%">Ordem</th>
				<th align="center" width="15%">Submenu</th>
				<th align="center" width="15%">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($BLC_DADOS as $pagina) { ?>
			<tr>
				<td align="center"><input type="checkbox" id="excluir" name="excluir[]" value=""></td>
				<td><?php echo $pagina['TITULOPAGINA']; ?></td>
				<td class="no-mobile" align="center" ><?php echo $pagina['PAGINAORDEM']; ?></td>
				<td align="center"><?php echo $pagina['PAGINASUB']; ?></td>
				<td align="center"><a href="<?php echo $pagina['URLEDITAR']; ?>" class="icon-edit"><img src="<?php echo base_url('assets/images/edit.png'); ?>"></a><a href="<?php echo $pagina['URLEXCLUIR']; ?>" class="icon-delete"><img src="<?php echo base_url('assets/images/delete.png'); ?>"></a></td>
			</tr>
			<?php } ?>
		</tbody>
		
	</table>
					
				</div>
				
			</div>

		
		</div>


<script type="text/javascript">

$(function() {

	oTable = $('#example').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers"
    });



});

</script>