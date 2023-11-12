<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAccounts extends Model
{
    use HasFactory;

 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Wakala_code',
        'Customer_id',
        'Name',
        'Status_Online',
        'Status_Disabled',
        'Phone',
        'email',
        'password',
        'last_seen',
        'shared_users',
        'download_used',
        'upload_used',
        'uptime_used',
    ];
}
/*
{
	".id": "*21",
	"active": "false",
	"customer": "admin",
	"disabled": "false",
	"download-used": "2900307433",
	"email": "winnyjames40@gmail.com",
	"first-name": "Winny",
	"incomplete": "false",
	"ipv6-dns": "::",
	"last-seen": "aug/03/2023 12:17:51",
	"password": "2020",
	"shared-users": "1",
	"upload-used": "74804779",
	"uptime-used": "1h18m56s",
	"username": "0756786753",
	"wireless-enc-algo": "none",
	"wireless-enc-key": "",
	"wireless-psk": ""
      @foreach($jsonData as $result)
                      
                  <tr>
                     <td>{{$result->username}}</td>
                     <td>{{$result->active}}</td>
                     <td>{{$result->first-name}}</td>
                     <td>{{$result->email}}</td>
                     <td>{{$result->username}}</td>
                     <td>{{$result->download-used}}</td>
                     <td>{{$result->last-seen}}</td>
                     <td>{{$result->uptime-used}}</td>
                     <td>{{$result->disabled}}</td>
                </tr>
                @endforeach
}
 */