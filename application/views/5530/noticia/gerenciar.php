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
				<th align="left" width="30%">Notícia</th>
				<th class="no-mobile" align="left" width="35%">Chamada da notícia</th>
				<th class="no-mobile" align="center" width="15%">Data</th>
				<th align="center" width="15%">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($BLC_DADOS as $noticia) { ?>
			<tr>
				<td align="center"><input type="checkbox" id="excluir" name="excluir[]" value=""></td>
				<td><?php echo $noticia['TITULONOTICIA']; ?></td>
				<td class="no-mobile"><?php echo $noticia['NOTICIATEMP']; ?></td>
				<td align="center"><?php echo $noticia['NOTICIADATA']; ?></td>
				<td align="center"><a href="<?php echo $noticia['URLEDITAR']; ?>" class="icon-edit"><img src="<?php echo base_url('assets/images/edit.png'); ?>"></a><a href="<?php echo $noticia['URLEXCLUIR']; ?>" class="icon-delete"><img src="<?php echo base_url('assets/images/delete.png'); ?>"></a></td>
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