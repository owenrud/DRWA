using MySql.Data.MySqlClient;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebAPI1.Models
{
    public class JadwalContext : DbContext
    {
        public JadwalContext(DbContextOptions<JadwalContext> options) : base(options)
        {
        }
        public string ConnectionString { get; set; }


        private MySqlConnection GetConnection()
        {
            return new MySqlConnection("Server = localhost; Database = sibaru; Uid = root; Pwd =");
        }

        public List<JadwalItem> GetAllJadwal()
        {
            List<JadwalItem> list = new List<JadwalItem>();

            using (MySqlConnection conn = GetConnection())
            {
                conn.Open();
                MySqlCommand cmd = new MySqlCommand("SELECT * FROM jadwal_guru", conn);
                using (MySqlDataReader reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        list.Add(new JadwalItem()
                        {
                            id_jadwal_guru = reader.GetInt32("id_jadwal_guru"),
                            thn_ac = reader.GetString("tahun_akademik"),
                            sms = reader.GetString("semester"),
                            id_guru = reader.GetInt32("id_guru"),
                            hari = reader.GetString("hari"),
                            id_kelas = reader.GetInt32("id_kelas"),
                            id_mapel = reader.GetInt32("id_mapel"),
                            jamMulai = reader.GetString("jam_mulai"),
                            jamSelesai = reader.GetString("jam_selesai")
                        });
                    }
                }
            }
            return list;
        }

        public List<JadwalItem> GetJadwal(string id)
        {
            List<JadwalItem> list = new List<JadwalItem>();

            using (MySqlConnection conn = GetConnection())
            {
                conn.Open();
                MySqlCommand cmd = new MySqlCommand("SELECT * FROM jadwal_guru WHERE id_jadwal_guru = @id", conn);
                cmd.Parameters.AddWithValue("@id", id);

                using (MySqlDataReader reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        list.Add(new JadwalItem()
                        {
                            id_jadwal_guru = reader.GetInt32("id_jadwal_guru"),
                            thn_ac = reader.GetString("tahun_akademik"),
                            sms = reader.GetString("semester"),
                            id_guru = reader.GetInt32("id_guru"),
                            hari = reader.GetString("hari"),
                            id_kelas = reader.GetInt32("id_kelas"),
                            id_mapel = reader.GetInt32("id_mapel"),
                            jamMulai = reader.GetString("jam_mulai"),
                            jamSelesai = reader.GetString("jam_selesai")
                        });
                    }
                }
            }
            return list;
        }
        public List<JadwalItem> GetJadwalByNIP(string id_guru)
        {
            List<JadwalItem> list = new List<JadwalItem>();

            using (MySqlConnection conn = GetConnection())
            {
                conn.Open();
                MySqlCommand cmd = new MySqlCommand("SELECT * FROM jadwal_guru WHERE id_guru = @id", conn);
                cmd.Parameters.AddWithValue("@id", id_guru);

                using (MySqlDataReader reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        list.Add(new JadwalItem()
                        {
                            id_jadwal_guru = reader.GetInt32("id_jadwal_guru"),
                            thn_ac = reader.GetString("tahun_akademik"),
                            sms = reader.GetString("semester"),
                            id_guru = reader.GetInt32("id_guru"),
                            hari = reader.GetString("hari"),
                            id_kelas = reader.GetInt32("id_kelas"),
                            id_mapel = reader.GetInt32("id_mapel"),
                            jamMulai = reader.GetString("jam_mulai"),
                            jamSelesai = reader.GetString("jam_selesai")
                        });
                    }
                }
            }
            return list;
        }
        public List<JadwalItem> GetJadwalByMapel(string id_mapel)
        {
            List<JadwalItem> list = new List<JadwalItem>();

            using (MySqlConnection conn = GetConnection())
            {
                conn.Open();
                MySqlCommand cmd = new MySqlCommand("SELECT * FROM jadwal_guru WHERE id_mapel = @id", conn);
                cmd.Parameters.AddWithValue("@id", id_mapel);

                using (MySqlDataReader reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        list.Add(new JadwalItem()
                        {
                            id_jadwal_guru = reader.GetInt32("id_jadwal_guru"),
                            thn_ac = reader.GetString("tahun_akademik"),
                            sms = reader.GetString("semester"),
                            id_guru = reader.GetInt32("id_guru"),
                            hari = reader.GetString("hari"),
                            id_kelas = reader.GetInt32("id_kelas"),
                            id_mapel = reader.GetInt32("id_mapel"),
                            jamMulai = reader.GetString("jam_mulai"),
                            jamSelesai = reader.GetString("jam_selesai")
                        });
                    }
                }
            }
            return list;
        }
        public JadwalItem AddJadwal(JadwalItem ji)
        {
            using (MySqlConnection conn = GetConnection())
            {
                conn.Open();
                MySqlCommand cmd = new MySqlCommand("INSERT INTO jadwal_guru (tahun_akademik,semester,id_guru,hari,id_kelas" +
                    "id_mapel,jam_mulai,jam_selesai)" +
                    "VALUES((@tahun_akademik,@semester,@id_guru,@hari,@id_kelas" +
                    "@id_mapel,@jamMulai,@jamSelesai)", conn);
                cmd.Parameters.AddWithValue("@tahun_akademik", ji.thn_ac);
                cmd.Parameters.AddWithValue("@semester", ji.sms);
                cmd.Parameters.AddWithValue("@id_guru", ji.id_guru);
                cmd.Parameters.AddWithValue("@hari", ji.hari);
                cmd.Parameters.AddWithValue("@id_kelas", ji.id_kelas);
                cmd.Parameters.AddWithValue("@id_mapel", ji.id_mapel);
                cmd.Parameters.AddWithValue("@jam_mulai", ji.jamMulai);
                cmd.Parameters.AddWithValue("@jam_selesai", ji.jamSelesai);
                cmd.ExecuteReader();
            }
            return ji;
        }
    }
}
