

    <script  src="<?php echo APP . PUBFOL . "js/script.js"; ?>"></script>
    <?php if(isset($this->data['js'])) : ?>
    <script type="module" src="<?php echo APP . PUBFOL . "js/{$this->data['js']}.js?t223=0"; ?>"></script>
    <?php endif; ?>
</body>
</html>