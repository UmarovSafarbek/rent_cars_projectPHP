

    <script  src="<?php echo PUBFOL . "js/script.js"; ?>"></script>
    <?php if(isset($this->data['js'])) : ?>
    <script type="module" src="<?php echo PUBFOL . "js/{$this->data['js']}.js?sd3"; ?>"></script>
    <?php endif; ?>
</body>
</html>