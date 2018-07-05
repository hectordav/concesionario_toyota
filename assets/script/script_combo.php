 <script type="text/javascript">
            $(document).ready(function() {
                $("#id_tipo").change(function() {
                    $("#id_tipo option:selected").each(function() {
                        id_tipo = $('#id_tipo').val();
                        $.post("<?php echo base_url(); ?>modelo/fill_marca", {
                            id_tipo : id_tipo
                        }, function(data) {
                            $("#id_marca").html(data);
                        });
                    });
                });
            });
             $(document).ready(function() {
                $("#id_marca").change(function() {
                    $("#id_marca option:selected").each(function() {
                        id_marca = $('#id_marca').val();
                        $.post("<?php echo base_url(); ?>accesorio/fill_modelo", {
                            id_marca : id_marca
                        }, function(data) {
                            $("#id_modelo").html(data);
                        });
                    });
                });
            });
             $(document).ready(function() {
                $("#id_cliente").change(function() {
                    $("#id_cliente option:selected").each(function() {
                        id_cliente = $('#id_cliente').val();
                        $.post("<?php echo base_url(); ?>peritaje/fill_vehiculo", {
                            id_cliente : id_cliente
                        }, function(data) {
                            $("#id_vehiculo").html(data);
                        });
                    });
                });
            });
</script>