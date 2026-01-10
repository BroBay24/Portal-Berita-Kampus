<?php

namespace App\Filament\Widgets;

use App\Models\News;
use App\Models\Author;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $hitungNews = News::count();
        $hitungAdmin = Author::count();

        // Hitung jumlah berita hari ini dan kemarin
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $todayNewsCount = News::whereDate('created_at', $today)->count();
        $yesterdayNewsCount = News::whereDate('created_at', $yesterday)->count();

        // Persentase kenaikan berita harian
        if ($yesterdayNewsCount > 0) {  
            $persentaseKenaikan = round((($todayNewsCount - $yesterdayNewsCount) / $yesterdayNewsCount) * 100, 2);
        } else {    
            $persentaseKenaikan = $todayNewsCount > 0 ? 100 : 0;
        }

        $icon = $persentaseKenaikan >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $deskripsi = abs($persentaseKenaikan) . '% ' . ($persentaseKenaikan >= 0 ? 'increase' : 'decrease');

        // Persentase kenaikan berita mingguan
        $startOfThisWeek = Carbon::now()->startOfWeek();
        $endOfThisWeek = Carbon::now()->endOfWeek();

        $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek();

        $thisWeekNews = News::whereBetween('created_at', [$startOfThisWeek, $endOfThisWeek])->count();
        $lastWeekNews = News::whereBetween('created_at', [$startOfLastWeek, $endOfLastWeek])->count();

        if ($lastWeekNews > 0) {
            $persentaseMingguan = round((($thisWeekNews - $lastWeekNews) / $lastWeekNews) * 100, 2);
        } else {
            $persentaseMingguan = $thisWeekNews > 0 ? 100 : 0;
        }

        $ikonMingguan = $persentaseMingguan >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $deskripsiMingguan = abs($persentaseMingguan) . '% ' . ($persentaseMingguan >= 0 ? 'increase' : 'decrease');

        // ✅ Tambahan: Hitung kenaikan penulis hari ini vs kemarin
        $todayAuthorCount = Author::whereDate('created_at', $today)->count();
        $yesterdayAuthorCount = Author::whereDate('created_at', $yesterday)->count();

        if ($yesterdayAuthorCount > 0) {
            $persentaseAuthor = round((($todayAuthorCount - $yesterdayAuthorCount) / $yesterdayAuthorCount) * 100, 2);
        } else {
            $persentaseAuthor = $todayAuthorCount > 0 ? 100 : 0;
        }

        $ikonAuthor = $persentaseAuthor >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $deskripsiAuthor = abs($persentaseAuthor) . '% ' . ($persentaseAuthor >= 0 ? 'increase' : 'decrease');

        return [
            Stat::make('Total Jumlah Berita', $hitungNews . ' Berita')
                ->description($deskripsiMingguan)
                ->descriptionIcon($ikonMingguan),

            Stat::make('Berita Hari Ini ', $todayNewsCount . ' Berita')
                ->description($deskripsi)
                ->descriptionIcon($icon),

            // ✅ Tambahan data admin/penulis
            Stat::make('Total Jumlah Penulis Berita', $hitungAdmin . ' Penulis')
                ->description($deskripsiAuthor)
                ->descriptionIcon($ikonAuthor),
        ];
    }
}
