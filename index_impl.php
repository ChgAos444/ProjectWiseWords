<?php
// Handle GET parameters
$city = isset($_GET['city']) ? $_GET['city'] : 'Shkodër';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Kosovo
$kosovoSearch = isset($_GET['kosovo_search']) ? $_GET['kosovo_search'] : '';
$kosovoPage = isset($_GET['kosovo_page']) ? intval($_GET['kosovo_page']) : 1;

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

function formatCityName($city) {
    return str_replace('_', ' ', $city);
}

function buildUrl(array $overrides = []) {
    // Start with existing GET parameters
    $params = $_GET;

    // Override or add new params
    foreach ($overrides as $key => $value) {
        $params[$key] = $value;
    }

    return '?' . http_build_query($params);
}
