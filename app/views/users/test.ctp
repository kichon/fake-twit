<h2>Test</h2>
<?php if (!empty($data)): ?>
    <?php foreach ($data as $d): ?>
        <pre>
        <?php print_r($d['Tweet']['tweet']); ?>
        </pre>
    <?php endforeach; ?>
<?php endif; ?>
