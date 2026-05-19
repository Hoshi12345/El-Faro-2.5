<?= view('templates/header') ?>

<main class="container my-5">
    <?= $content ?? 'No hay Contenido'?>
</main>

<?= view('templates/footer') ?>

<script>
    const BASE_URL = '<?= base_url() ?>';
</script>

<script src="<?= base_url('js/script.js') ?>"></script>

</body>
</html>