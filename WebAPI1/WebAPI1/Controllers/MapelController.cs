using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using WebAPI1.Models;

namespace WebAPI1.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class MapelController : ControllerBase
    {
        private MapelContext _context;

        public MapelController(MapelContext context) { this._context = context; }
        //GET/API/KELAS
        [HttpGet]
        public ActionResult<IEnumerable<MapelItem>> GetSiswaItems()
        {
            _context = HttpContext.RequestServices.GetService(typeof(MapelContext)) as MapelContext;
            return _context.GetAllMapel();
        }
        //GET/API/KELAS/ID
        [HttpGet ("{id}", Name="GET_Mapel")]
        public ActionResult<IEnumerable<MapelItem>> GetSiswaItems(string id)
        {
            _context = HttpContext.RequestServices.GetService(typeof(MapelContext)) as MapelContext;
            return _context.GetMapel(id);
        }
        //POST/API/KELAS/
        [HttpPost]
        public ActionResult<MapelItem> AddMapel([FromForm] string nama, [FromForm] string desc)
        {
            MapelItem gi = new MapelItem();
            gi.nama_mapel = nama;
            gi.desc = desc;

            _context = HttpContext.RequestServices.GetService(typeof(MapelContext)) as MapelContext;
            return _context.AddMapel(gi);
        }
    }
}
