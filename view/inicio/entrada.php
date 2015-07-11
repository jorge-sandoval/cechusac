<img data-content="<?php echo htmlspecialchars($this->Attach->nombreproducto); ?>" src="<?php echo $this->BaseUrl('uploads/' . $this->Attach->imagenURL); ?>" class="img-thumbnail" />
<p class="well well-sm"><?php echo $this->Attach->nombreproducto; ?></p>
<?php echo $this->Attach->decripcionproducto; ?>