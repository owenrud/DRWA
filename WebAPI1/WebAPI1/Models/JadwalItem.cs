namespace WebAPI1.Models
{
    public class JadwalItem
    {
        public int id_jadwal_guru { get; set; }
        public string thn_ac { get; set; }
        public string sms { get; set; }
        public int id_guru { get; set; }
        public string hari { get; set; }
        public int id_kelas { get; set; }
        public int id_mapel { get; set; }
        public string jamMulai { get; set; }
        public string jamSelesai { get; set; }
    }
}
