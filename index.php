<?php
require_once "parts/header.php";
require_once "parts/nav.php";
require_once "parts/database_conn.php";

// Handle GET parameters
$city = isset($_GET['city']) ? $_GET['city'] : 'Shkodër';
$search = $_GET['search'] ?? '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// Base SQL
$sql = "SELECT * FROM saying WHERE city = ?";
$params = [$city];
$types = "s";

if ($search) {
    $sql .= " AND phrase LIKE ?";
    $params[] = "%$search%";
    $types .= "s";
}

// Total rows
$countSql = str_replace("*", "COUNT(*) as total", $sql);
$stmt = $conn->prepare($countSql);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$total = $stmt->get_result()->fetch_assoc()['total'];

// Fetch data
$sql .= " LIMIT $limit OFFSET $offset";
$stmt = $conn->prepare($sql);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();
$phrases = $result->fetch_all(MYSQLI_ASSOC);

// Total pages
$totalPages = ceil($total / $limit);

// Helper to format city names
function formatCityName($city)
{
    return str_replace('_', ' ', $city);
}

?>

    <style>
        .map-title {
            margin-bottom: 2rem;
            font-size: 5rem;
        }

        .map-btn {
            font-weight: 600;
            text-transform: uppercase;
            color: #ffffff;
            background: #FD7979;
        }

        .map-btn:hover {
            background: #FEEAC9;
        }

        .page-item.active .page-link {
            color: #fff !important;
            border: 1px solid #9A3F3F;
            background: #FD7979 !important;
        }

        @media (max-width: 576px) {
            .map-title {
                font-size: 3.5rem; /* much smaller on small phones */
            }
        }
    </style>

    <section class="map-section px-3 py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left content -->
                <div class="col-lg-8 mb-4 mb-lg-0 ">
                    <div>
                        <h1 class="map-title display-4 fw-bold">Zbuloni fjalorin e artë Shqiptar</h1>
                        <p class="map-subtitle fs-3 text-muted my-4">
                            Fjalë të urta dhe proverba nga qytete të ndryshme të Shqipërisë. Mësoni kulturën
                            dhe mençurinë popullore të çdo rajoni dhe shijoni thëniet e vjetra që kanë kaluar brez pas
                            brezi.
                        </p>
                        <a href="#" class="btn btn-lg map-btn px-4 py-3">Shfleto Tani</a>
                    </div>
                </div>

                <!-- Right map -->
                <div class="col-lg-4 text-center text-lg-end mt-5 mt-md-0">
                    <div class="map-wrapper">
                        <?php include 'images/map_master.svg'; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row align-items-center">
            <!-- Map -->
            <div class="col-lg-4 mb-4">
                <?php include 'images/districts_in_albania_edited.svg'; ?>
            </div>

            <!-- City phrases -->
            <div class="col-lg-8">
                <h1 id="city-name" class="mb-4">
                    Fjalë të urta të qytetit: <?= htmlspecialchars(formatCityName($city)) ?>
                </h1>

                <!-- Search -->
                <form method="get" class="d-flex" style="max-width:400px;">
                    <input type="hidden" name="city" value="<?= htmlspecialchars($city) ?>">
                    <input type="text" name="search" class="form-control me-2"
                           placeholder="Kërko fjalët..." value="<?= htmlspecialchars($search) ?>">
                    <button type="submit" class="btn" style="color: #ffffff; background: #FD7979;">Kërko</button>
                </form>

                <!-- Table -->
                <div class="table-responsive mt-4">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table">
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
                            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                                <a class="page-link" style="color: #ffffff; background: #FD7979;"
                                   href="?city=<?= urlencode($city) ?>&search=<?= urlencode($search) ?>&page=<?= $page - 1 ?>">Paraqit</a>
                            </li>
                            <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                                <li class="page-item <?= $p == $page ? 'active' : '' ?>">
                                    <a class="page-link" style="color: #FD7979;"
                                       href="?city=<?= urlencode($city) ?>&search=<?= urlencode($search) ?>&page=<?= $p ?>"><?= $p ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                                <a class="page-link" style="color: #ffffff; background: #FD7979;"
                                   href="?city=<?= urlencode($city) ?>&search=<?= urlencode($search) ?>&page=<?= $page + 1 ?>">Vijon</a>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script src="node_modules/gsap/dist/gsap.min.js"></script>
    <script src="node_modules/gsap/dist/ScrollTrigger.min.js"></script>
    <script src="index_animation_gsap.js"></script>
    <script>
        document.querySelectorAll('[data-city]').forEach(el => {
            el.style.cursor = 'pointer';
            el.addEventListener('click', () => {
                const city = el.dataset.city;
                window.location.href = `?city=${encodeURIComponent(city)}`;
            });
        });
    </script>
<?php
require_once "parts/footer.php";