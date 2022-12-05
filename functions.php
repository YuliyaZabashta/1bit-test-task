require_once('crest/crest.php');
$result_lids = CRest::call(
    'crm.lead.list',
    [
        'filter' => [
            '>=DATE_CREATE' => '2022-12-01T00:00:00'
        ],
        'select' => [
            'TITLE',
            'NAME',
            'PHONE',
	    'DATE_CREATE',
	    'CONTACT_ID'
        ]
    ]
);
$lides = $result_lids['result'];
$result_conts = CRest::call(
    'crm.contact.list',
    [
        'filter' => [
            '>=DATE_CREATE' => '2022-12-01T00:00:00'
        ],
        'select' => [
	    'ID',
            'TITLE',
            'NAME',
            'PHONE',
        ]
    ]
);
$contacts_lid = $result_conts['result'];

function phone_format($phone) {
	$phone = trim($phone);
	$res = preg_replace('/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/','+7 ($2) $3-$4-$5', $phone);
	return $res;
}
	

