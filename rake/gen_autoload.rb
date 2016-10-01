def gen_autoload(directory)
  file_name = "#{directory}/autoload.php"

  desc "Generate autoload.php for #{directory}/"
  file file_name => FileList["#{directory}/**/*.php"].exclude(file_name) do
    sh 'phpab', '-o', file_name, directory
  end

  CLEAN.include(file_name)

  file_name
end