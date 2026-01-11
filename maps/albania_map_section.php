<section class="container-fluid my-5 scroll-section" style="width: 75% ">
    <div class="row align-items-center">
        <!-- Map -->
        <div class="col-lg-4 mb-4 pe-md-5">
            <div class="scroll-map scroll-map-albania">
                <?php include 'images/albania_map_disctricts.svg'; ?>
            </div>
        </div>

        <!-- City phrases -->
        <div class="col-lg-8 ps-md-5">
            <h1 id="city-name" class="mb-4">
                Fjalë të urta të qytetit: <?= htmlspecialchars(formatCityName($city)) ?>
            </h1>

            <!-- Search -->
            <form method="get" class="mb-3 d-flex" style="max-width:400px;">
                <!-- Preserve other GET params -->
                <?php foreach ($_GET as $key => $value):
                    if ($key !== 'search' && $key !== 'page'): ?>
                        <input type="hidden" name="<?= htmlspecialchars($key) ?>"
                               value="<?= htmlspecialchars($value) ?>">
                    <?php endif; endforeach; ?>

                <input type="hidden" name="city" value="<?= htmlspecialchars($city) ?>">
                <input type="text" name="search" class="form-control me-2"
                       placeholder="Kërko fjalët..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn" style="color:#fff;background:#FD7979;">Kërko</button>
            </form>

            <!-- Table -->
            <div class="table-responsive mt-4">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Fjala</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($phrases) > 0): ?>
                        <?php foreach ($phrases as $i => $row): ?>
                            <tr>
                                <td><?= $offset + $i + 1 ?></td>
                                <td><?= htmlspecialchars($row['phrase']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="text-center">Nuk u gjetën proverba për këtë qytet.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
                <nav aria-label="Page navigation" class="mt-3">
                    <ul class="pagination justify-content-center flex-wrap">
                        <!-- Previous -->
                        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                            <a class="page-link" style="color:#fff;background:#FD7979;"
                               href="<?= buildUrl(['page' => $page - 1]) ?>">Paraqit</a>
                        </li>

                        <!-- Page numbers -->
                        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                            <li class="page-item <?= $p == $page ? 'active' : '' ?>">
                                <a class="page-link" style="color:#FD7979;"
                                   href="<?= buildUrl(['page' => $p]) ?>"><?= $p ?></a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next -->
                        <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" style="color:#fff;background:#FD7979;"
                               href="<?= buildUrl(['page' => $page + 1]) ?>">Vijon</a>
                        </li>
                    </ul>

                </nav>
            <?php endif; ?>
        </div>
    </div>
</section>