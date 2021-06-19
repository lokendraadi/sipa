<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<h1>Rekap Data Surat Masuk</h1>
<table id="customers">
    <tr>
        <th>No</th>
        <th>No.Surat</th>
        <th>No.Agenda</th>
        <th>Tanggal PKPA</th>
        <th>Tanggal Surat</th>
        <th>Perihal</th>
        <th>Dari</th>
        <th>Kepada</th>
        <th>Disposisi</th>
        <th>Posisi Terakhir</th>
    </tr>
    @php
        $no = 1;
    @endphp
    @foreach ($data as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->no_surat }}</td>
            <td>{{ $row->no_agenda }}</td>
            <td>{{ date('d-m-Y', strtotime($row->tanggal_pkpa)) }}</td>
            <td>{{ date('d-M-y', strtotime($row->tanggal_surat)) }}</td>
            <td>{{ $row->perihal }}</td>
            <td>{{ $row->dari }}</td>
            <td>{{ $row->kepada }}</td>
            <td>{{ $row->disposisi }}</td>
            <td>{{ $row->posisi_terakhir }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
