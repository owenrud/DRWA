<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanJsonController extends Controller
{
    public function getDataSatu(){
        $data = array(
            "name"=> "owen rudiyanto so",
            "url"=> "https=>//www.google.com",
            "rank"=> 1,
            "socialmedia"=> array(
                "facebook"=> "",
                "twitter"=> "",
                "instagram"=> "",
                "youtube"=> "",
                "github"=> ""
            ));
            $jd=json_encode($data);
            dd($jd);
        }
        public function getDataDua(){
            $data = array(
                "first_name" => "owen",
                "last_name" => "Rudiyanto so",
                "location" => "Samarinda",
                "online" => true,
                "followers" => 987);
                $jd=json_encode($data);
                dd($jd);
            }
            public function getDataTiga(){
                $data = array(
                    "first_name" => "Owen",
                    "last_name" => "Rudiyanto So",
                    "location" => "Samarinda",
                    "websites" => array(
                      [
                        "description" => "work",
                        "URL" => "https=>//www.digitalocean.com/"
                      ],
                      [
                        "desciption" => "tutorials",
                        "URL" => "https=>//www.digitalocean.com/community/tutorials"
                      ]
                      ),
                    "social_media" => array(
                      [
                        "description" => "twitter",
                        "link" => "https=>//twitter.com/digitalocean"
                      ],
                      [
                        "description" => "facebook",
                        "link" => "https=>//www.facebook.com/DigitalOceanCloudHosting"
                      ],
                      [
                        "description" => "github",
                        "link" => "https=>//github.com/digitalocean"
                      ]
                    )
                    );
                    $jd=json_encode($data);
                    dd($jd);
                }
                public function getDataEmpat(){
                    $data = array(
                        "employees"=>array(
                            [
                                "firstName"=>"John", "lastName"=>"Doe"
                            ],
                            [
                                "firstName"=>"Anna", "lastName"=>"Smith"
                            ],
                            [
                                "firstName"=>"Peter","lastName"=>"Jones"
                            ]
                            
                        ));
                        $jd=json_encode($data);
                        dd($jd);
                    }
                    public function getDataLima(){
                        $data = array(
                            "matapelajaran"=> array(
                                "subject" => "Matematika",
                                "kelas" =>array (
                                    [
                                        "X" => "Argo",
                                        "Jadwal" => "Senin"
                                    ],
                                    [
                                        "XI" => "JJS",
                                        "Jadwal" => "Selasa"
                                    ],
                                    [
                                        "XII" => "Halim",
                                        "Jadwal" => "Rabu"
                                    ]
                                )
                                ));
                                $jd=json_encode($data);
                        dd($jd);
                        }
    }

