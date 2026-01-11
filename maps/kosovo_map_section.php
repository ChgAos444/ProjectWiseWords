<section class="container-fluid my-5 scroll-section" style="width: 75%;">
    <div class="row align-items-center">
        <!-- Kosovo sayings -->
        <div class="col-lg-7 order-2 order-md-1 pe-md-5">
            <h1 id="kosovo-name" class="mb-4">Fjalë të urta nga Kosova</h1>

            <!-- Search -->
            <form method="get" class="mb-3 d-flex" style="max-width:400px;">
                <?php foreach ($_GET as $key => $value):
                    if ($key !== 'kosovo_search' && $key !== 'kosovo_page'): ?>
                        <input type="hidden" name="<?= htmlspecialchars($key) ?>"
                               value="<?= htmlspecialchars($value) ?>">
                    <?php endif; endforeach; ?>

                <input type="text" name="kosovo_search" class="form-control me-2"
                       placeholder="Kërko fjalët në Kosovë..." value="<?= htmlspecialchars($kosovoSearch) ?>">
                <button type="submit" class="btn" style="color:#fff;background:#FD7979;">Kërko</button>
            </form>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Fjala</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Fetch Kosovo sayings
                    $kosovoSearch = isset($_GET['kosovo_search']) ? $_GET['kosovo_search'] : '';
                    $kosovoPage = isset($_GET['kosovo_page']) ? intval($_GET['kosovo_page']) : 1;
                    $kosovoLimit = 10;
                    $kosovoOffset = ($kosovoPage - 1) * $kosovoLimit;

                    $sql = "SELECT * FROM saying WHERE city = 'Kosovë'";
                    $params = [];
                    $types = "";

                    if ($kosovoSearch) {
                        $sql .= " AND phrase LIKE ?";
                        $params[] = "%$kosovoSearch%";
                        $types .= "s";
                    }

                    $countSql = str_replace("*", "COUNT(*) as total", $sql);
                    $stmt = $conn->prepare($countSql);
                    if ($types) $stmt->bind_param($types, ...$params);
                    $stmt->execute();
                    $total = $stmt->get_result()->fetch_assoc()['total'];

                    $sql .= " LIMIT $kosovoLimit OFFSET $kosovoOffset";
                    $stmt = $conn->prepare($sql);
                    if ($types) $stmt->bind_param($types, ...$params);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $phrases = $result->fetch_all(MYSQLI_ASSOC);
                    $totalPages = ceil($total / $kosovoLimit);

                    if (count($phrases) > 0):
                        foreach ($phrases as $i => $row): ?>
                            <tr>
                                <td><?= $kosovoOffset + $i + 1 ?></td>
                                <td><?= htmlspecialchars($row['phrase']) ?></td>
                            </tr>
                        <?php endforeach;
                    else: ?>
                        <tr>
                            <td colspan="2" class="text-center">Nuk u gjetën proverba për Kosovën.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
                <nav aria-label="Kosovo page navigation" class="mt-3">
                    <ul class="pagination justify-content-center flex-wrap">
                        <li class="page-item <?= $kosovoPage <= 1 ? 'disabled' : '' ?>">
                            <a class="page-link" style="color:#fff;background:#FD7979;"
                               href="<?= buildUrl(['kosovo_page' => $kosovoPage - 1]) ?>">Paraqit</a>
                        </li>

                        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                            <li class="page-item <?= $p == $kosovoPage ? 'active' : '' ?>">
                                <a class="page-link" style="color:#FD7979;"
                                   href="<?= buildUrl(['kosovo_page' => $p]) ?>"><?= $p ?></a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?= $kosovoPage >= $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" style="color:#fff;background:#FD7979;"
                               href="<?= buildUrl(['kosovo_page' => $kosovoPage + 1]) ?>">Vijon</a>
                        </li>
                    </ul>

                </nav>
            <?php endif; ?>
        </div>

        <!-- Kosovo map -->
        <div class="col-lg-5 order-1 order-md-2 mb-4 ps-md-5">
            <div class="scroll-map scroll-map-kosovo">
                <?php include "images/kosovo_map.svg"; ?>
            </div>
        </div>
    </div>
</section>