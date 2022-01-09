					</div>
				</div>
                <nav aria-label="Page navigation" id="clAc2">
                    <ul class="pagination justify-content-md-center">
                    <?php for($i = 1 ; $i <= $pages; $i++): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>
						<?php endfor; ?>
                    </ul>
                </nav>
			</div>

    <link rel="stylesheet" media="print" href="assets/css/print.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="assets/js/func.js"></script>
  </body>
</html>
