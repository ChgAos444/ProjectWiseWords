<?php
require_once "parts/header.php";
require_once "parts/nav.php";
require_once "parts/database_conn.php"; // your database connection

// Handle GET parameters
$bodyPart = isset($_GET['body']) ? $_GET['body'] : 'Koka'; // default head
$search = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$limit = 10;
$offset = ($page - 1) * $limit;

// Base SQL
$sql = "SELECT * FROM proverb WHERE body_part = ?";
$params = [$bodyPart];
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


function buildUrl(array $overrides = [])
{
    $params = $_GET;
    foreach ($overrides as $key => $value) {
        $params[$key] = $value;
    }
    return '?' . http_build_query($params);
}

?>

<style>
    .map-title {
        margin-bottom: 2rem;
        font-size: 5rem;
    }

    @media (max-width: 576px) {
        .map-title {
            font-size: 3rem;
        }
    }
</style>

<section class="container mt-3 my-md-5">
    <h1 class="map-title display-4 fw-bold text-center">Shprehje Frazeologjike</h1>
    <div class="row align-items-center">
        <div class="col-lg-4 p-3">
            <?php require_once "images/body_phrases.svg"; ?>
        </div>
        <div class="col-lg-8">
            <h1 class="mb-4 text-center text-md-start">
                Fjalë të urta për pjesën e trupit: <?= htmlspecialchars($bodyPart) ?>
            </h1>

            <!-- Search Form -->
            <form method="get" class="mb-3 d-flex" style="max-width:400px;">
                <?php foreach ($_GET as $key => $value):
                    if ($key !== 'search' && $key !== 'page'): ?>
                        <input type="hidden" name="<?= htmlspecialchars($key) ?>"
                               value="<?= htmlspecialchars($value) ?>">
                    <?php endif; endforeach; ?>

                <input type="hidden" name="body" value="<?= htmlspecialchars($bodyPart) ?>">
                <input type="text" name="search" class="form-control me-2"
                       placeholder="Kërko fjalët..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit" class="btn" style="color:#fff;background:#FD7979;">Kërko</button>
            </form>

            <!-- Proverbs Table -->
            <div class="table-responsive mt-4">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Fjala</th>
                        <th>Përshkrimi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($phrases) > 0): ?>
                        <?php foreach ($phrases as $i => $row): ?>
                            <tr>
                                <td><?= $offset + $i + 1 ?></td>
                                <td><?= htmlspecialchars($row['phrase']) ?></td>
                                <td><?= htmlspecialchars($row['description']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">Nuk u gjetën proverba për këtë pjesë të trupit.</td>
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
                            <a class="page-link" style="color:#fff;background:#FD7979;"
                               href="<?= buildUrl(['page' => $page - 1]) ?>">Paraqit</a>
                        </li>

                        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                            <li class="page-item <?= $p == $page ? 'active' : '' ?>">
                                <a class="page-link" style="color:#FD7979;"
                                   href="<?= buildUrl(['page' => $p]) ?>"><?= $p ?></a>
                            </li>
                        <?php endfor; ?>

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

<script>
    document.querySelectorAll('.body-part').forEach(part => {
        part.addEventListener('click', () => {
            const selectedPart = part.dataset.part;

            // Build new URL params, keeping everything except "page"
            const params = new URLSearchParams(window.location.search);

            // Remove page to reset pagination and search
            params.delete('page');
            params.delete('search');

            // Set the new body part
            params.set('body', selectedPart);

            // Reload page with updated body part
            window.location.search = params.toString();
        });
    });
</script>

<?php require_once "parts/footer.php"; ?>
